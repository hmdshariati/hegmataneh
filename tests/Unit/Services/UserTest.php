<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Core\Enums\EnumsUser;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Pagination\Paginator;
use App\Notifications\ConfirmAccountNotification;

class UserTest extends TestCase
{
    use WithFaker ;

    protected $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = app(UserService::class);
    }

    /**
     * @return User
     */
    public function test_user_create()
    {
        $role = Role::factory()->create();

        $fakeUser = User::factory()->make();

        $user = $this->userService->create(
            array_merge([
                "role_id" => $role->id,
                "password" => bcrypt("secret")
            ], $fakeUser->toArray())
        );

        $this->assertInstanceOf(User::class, $user);
        $this->assertNotEmpty($user->name);
        $this->assertNotEmpty($user->mobile);
        $this->assertIsBool($user->status);
        $this->assertNotEmpty($user->email);
        $this->assertNotEmpty($user->username);
        $this->assertNotEmpty($user->password);
        $this->assertNotEmpty($user->remember_token);
        $this->assertNotEmpty($user->bio);
        return $user;
    }

    /**
     * @depends test_user_create
     */
    public function test_user_update($user)
    {
        $role = Role::factory()->create();

        $fakeUser = User::factory()->make() ;


        $user = $this->userService->update($user, [
            "name" => $name = $this->faker->name() ,
            "username" => $username = $fakeUser->username ,
            "email" => $email = $fakeUser->email ,
            "mobile" => $mobile = $fakeUser->mobile ,
            "status" => $status = EnumsUser::STATUS_DISABLE,
            "role_id" => $roleId = $role->id,
            "bio" => $bio = "::BIO::",
            "password" => $password = "secret",
        ]);

        $this->assertEquals($user->username, $username);
        $this->assertEquals($user->name, $name);
        $this->assertEquals($user->mobile, $mobile);
        $this->assertEquals($user->email, $email);
        $this->assertEquals($user->role_id, $roleId);
        $this->assertEquals($user->status, $status);
        $this->assertEquals($user->bio, $bio);

        $this->assertTrue(
            Hash::check($password, $user->password)
        );

        return $user;
    }


    public function test_user_verify()
    {
        $user = User::factory()
            ->for(Role::factory())
            ->state([
                "status" => EnumsUser::STATUS_DISABLE,
                "verified_at" => NULL
            ])
            ->create();

        $token = $user->remember_token;
        $user  = $this->userService->verify($token);

        $this->assertEquals($user->status, EnumsUser::STATUS_ENABLE);
        $this->assertNotNull($user->verified_at);
        $this->assertNotEquals($user->remember_token, $token);

        return $user;
    }

    /**
     * @depends test_user_verify
     */
    public function test_user_delete($user)
    {
        $result = $this->userService->delete($user);
        $this->assertTrue($result);
    }

    public function test_remember_token_generator()
    {
        $token =  $this->userService->rememberTokenGenerate();
        $this->assertIsString($token);
    }

    public function test_get_all_user_without_filters()
    {
        $count = 5;

        User::factory()
            ->count($count)
            ->for(Role::factory())
            ->create();

        $users = $this->userService->list([]);
        $this->assertInstanceOf(Paginator::class, $users);
    }

    public function test_get_all_user_with_filter_email()
    {
        $user = User::factory()
            ->for(Role::factory())
            ->create();

        $users = $this->userService->list([
            "email" => $user->email
        ]);

        $this->assertEquals($users->total(), 1);
    }

    public function test_get_all_user_with_filter_mobile()
    {
        $user = User::factory()
            ->for(Role::factory())
            ->create();

        $users = $this->userService->list([
            "mobile" => $user->mobile
        ]);

        $this->assertEquals($users->total(), 1);
    }

    public function test_get_all_user_with_filter_username()
    {
        $user = User::factory()
            ->for(Role::factory())
            ->create();

        $users = $this->userService->list([
            "username" => $user->username
        ]);

        $this->assertEquals($users->total(), 1);
    }

    public function test_send_verify_account_notification()
    {
        $user =
            User::factory()
            ->for(Role::factory())
            ->state([
                "status" => EnumsUser::STATUS_DISABLE
            ])
            ->create();

        Notification::fake();
        Notification::assertNotSentTo($user , ConfirmAccountNotification::class);
        $this->userService->sendVerifyNotification($user) ;
        Notification::assertSentTo($user, ConfirmAccountNotification::class);
    }
}
