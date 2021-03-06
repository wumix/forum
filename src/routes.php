<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'forum'), function()
{
	Route::get('/', array(
		'as' 	=> 'home',
		'uses' 	=> 'Eubby\Controllers\IndexController@getIndex'
		));

	Route::get('user/login', array(
		'as' 	=> 'login',
		'uses' 	=> 'Eubby\Controllers\UserController@getLogin'
		));

	Route::post('user/login', array(
		'before' => 'csrf',
		'as' 	=> 'post_login',
		'uses' 	=> 'Eubby\Controllers\UserController@postLogin'
		));

	Route::get('user/logout', array(
		'as' 	=> 'logout',
		'uses' 	=> 'Eubby\Controllers\UserController@getLogout'
		));

	Route::get('user/join', array(
		'as' 	=> 'join',
		'uses' 	=> 'Eubby\Controllers\UserController@getJoin'
		));

	Route::post('user/join', array(
		'as' 	=> 'post_join',
		'uses' 	=> 'Eubby\Controllers\UserController@postJoin'
		));
	Route::get('user/activate/{id}', array(
		'as' 	=> 'account_activation',
		'uses' 	=> 'Eubby\Controllers\UserController@getActivate'
		));

	Route::get('profile/{username}', array(
		'as' 	=> 'profile',
		'uses' 	=> 'Eubby\Controllers\ProfileController@getIndex'
	));

	Route::get('settings', array(
		'as' 	=> 'settings',
		'uses' 	=> 'Eubby\Controllers\SettingsController@getIndex'
		));

	Route::get('conversation/follow/{slug}', array(
		'as' 	=> 'follow_conversation',
		'uses' 	=> 'Eubby\Controllers\ConversationController@getFollow'
		));

	Route::get('conversation/unfollow/{slug}', array(
		'as' 	=> 'unfollow_conversation',
		'uses' 	=> 'Eubby\Controllers\ConversationController@getUnfollow'
		));

	Route::get('conversation/view/{slug}', array(
		'as' 	=> 'view_conversation',
		'uses' 	=> 'Eubby\Controllers\ConversationController@getView'
		));

	Route::get('conversation/start/{username?}', array(
		'as' 	=> 'start_conversation',
		'uses' 	=> 'Eubby\Controllers\ConversationController@getStart'
		));

	Route::post('conversation/start', array(
		'as' 	=> 'post_conversation',
		'uses' 	=> 'Eubby\Controllers\ConversationController@postStart'
		));

	Route::post('conversation/reply/{slug}', array(
		'as' 	=> 'post_reply',
		'uses' 	=> 'Eubby\Controllers\ConversationController@postReply'
		));

	Route::get('conversations/list/{channel}', array(
		'as' 	=> 'list_conversations',
		'uses' 	=> 'Eubby\Controllers\ConversationController@getList'
		));

	Route::post('subscription/addsubscriber', array(
		'as' 	=> 'add_subscriber',
		'uses' 	=> 'Eubby\Controllers\ConversationController@postAddSubscriber'
		));

	Route::post('subscription/ajaxaddsubscriber', array(
		'as' 	=> 'ajax_add_subscriber',
		'uses' 	=> 'Eubby\Controllers\ConversationController@postAjaxAddSubscriber'
		));

	Route::post('subscription/ajaxremovesubscriber', array(
		'as' 	=> 'ajax_remove_subscriber',
		'uses' 	=> 'Eubby\Controllers\ConversationController@postAjaxRemoveSubscriber'
		));

	Route::get('subscription/removesubscriber', array(
		'as' 	=> 'remove_subscriber',
		'uses' 	=> 'Eubby\Controllers\ConversationController@getRemoveSubscriber'
		));

	Route::get('conversation/index/search', array(
		'as' 	=> 'conversation_search',
		'uses' 	=> 'Eubby\Controllers\IndexController@getIndex'
		));

	Route::get('settings/profile', array(
		'as' 	=> 'settings',
		'uses' 	=> 'Eubby\Controllers\SettingsController@getProfile'
		));

	Route::post('settings/profile', array(
		'as' 	=> 'post_settings',
		'uses' 	=> 'Eubby\Controllers\SettingsController@postProfile'
		));

	Route::get('settings/password', array(
		'as' 	=> 'password_settings',
		'uses' 	=> 'Eubby\Controllers\SettingsController@getPassword'
		));

	Route::post('settings/password', array(
		'as' 	=> 'post_password_settings',
		'uses' 	=> 'Eubby\Controllers\SettingsController@postPassword'
		));

	Route::get('settings/notifications', array(
		'as' 	=> 'notifications',
		'uses' 	=> 'Eubby\Controllers\SettingsController@getNotifications'
		));

	Route::get('members', array(
		'as' 	=> 'members',
		'uses' 	=> 'Eubby\Controllers\MembersController@getIndex'
	));

	Route::get('members/group', array(
		'as' 	=> 'members_group',
		'uses' 	=> 'Eubby\Controllers\MembersController@getGroup'
		));

	Route::post('members/group', array(
		'as' 	=> 'members_group_post',
		'uses' 	=> 'Eubby\Controllers\MembersController@postGroup'
		));

	Route::get('members/delete/{id}', array(
		'as' 	=> 'members_delete',
		'uses' 	=> 'Eubby\Controllers\MembersController@getDelete'
		));

	Route::get('members/suspend/{id}', array(
		'as' 	=> 'members_suspend',
		'uses' 	=> 'Eubby\Controllers\MembersController@getSuspend'
		));

	Route::get('members/unsuspend/{id}', array(
		'as' 	=> 'members_unsuspend',
		'uses' 	=> 'Eubby\Controllers\MembersController@getUnSuspend'
		));

	Route::get('members/profile/{username}', array(
		'as' 	=> 'members_profile',
		'uses' 	=> 'Eubby\Controllers\MembersController@getProfile'
		));

	Route::get('members/stats/{username}', array(
		'as' 	=> 'members_stats',
		'uses' 	=> 'Eubby\Controllers\MembersController@getStats'
		));

	Route::get('members/activity/{username}', array(
		'as' 	=> 'members_activity',
		'uses' 	=> 'Eubby\Controllers\MembersController@getActivity'
		));

	Route::get('notifications/hide/{id}', array(
		'as' 	=> 'hide_notification',
		'uses' 	=> 'Eubby\Controllers\NotificationsController@getHide'
	));

	Route::get('notifications/remove/{id}', array(
		'as' 	=> 'remove_notification',
		'uses' 	=> 'Eubby\Controllers\NotificationsController@getRemove'
		));

	Route::post('posts/ajaxdelete', array(
		'as' 	=> 'ajax_posts_delete',
		'uses' 	=> 'Eubby\Controllers\PostsController@postAjaxDelete'
		));

	Route::post('posts/ajaxupdate', array(
		'as' 	=> 'ajax_posts_update',
		'uses' 	=> 'Eubby\Controllers\PostsController@postAjaxUpdate'
		));
});


Route::group(array('prefix' => 'admin'), function()
{
		Route::get('/', array(
			'as' 	=> 'admin_dashboard',
			'uses' 	=> 'Eubby\Controllers\Admin\DashboardController@getIndex'
			));

		Route::get('appearance', array(
			'as' 	=> 'admin_appearance',
			'uses' 	=> 'Eubby\Controllers\Admin\AppearanceController@getIndex'
			));

		Route::post('appearance', array(
			'as' 	=> 'admin_appearance_post',
			'uses' 	=> 'Eubby\Controllers\Admin\AppearanceController@postIndex'
			));

		Route::get('settings', array(
			'as' 	=> 'admin_settings',
			'uses' 	=> 'Eubby\Controllers\Admin\SettingsController@getIndex'
			));

		Route::get('settings/write', array(
			'as' 	=> 'admin_settings_write',
			'uses' 	=> 'Eubby\Controllers\Admin\SettingsController@getWrite'
			));

		Route::post('settings/update', array(
			'as' 	=> 'admin_settings_update',
			'uses' 	=> 'Eubby\Controllers\Admin\SettingsController@postUpdate'
			));

		Route::get('channels', array(
			'as' 	=> 'admin_channels',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@getIndex'
			));

		Route::get('channels/edit/{id}', array(
			'as' 	=> 'admin_channels_edit',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@getEdit'
			));

		Route::post('channels/edit/{id}', array(
			'as' 	=> 'admin_channels_edit_post',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@postEdit'
			));

		Route::get('channels/create', array(
			'as' 	=> 'admin_channels_create',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@getCreate'
			));

		Route::post('channels/create', array(
			'as' 	=> 'admin_channels_create_post',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@postCreate'
			));

		Route::get('channels/delete/{id}', array(
			'as' 	=> 'admin_channels_delete',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@getDelete'
			));

		Route::get('channels/restore/{id}', array(
			'as' 	=> 'admin_channels_restore',
			'uses' 	=> 'Eubby\Controllers\Admin\ChannelsController@getRestore'
			));

		Route::get('groups', array(
			'as' 	=> 'admin_groups',
			'uses' 	=> 'Eubby\Controllers\Admin\GroupsController@getIndex'
			));
		
		Route::get('groups/create', array(
			'as' 	=> 'admin_groups_create',
			'uses' 	=> 'Eubby\Controllers\Admin\GroupsController@getCreate'
			));

		Route::post('groups/create', array(
			'as' 	=> 'admin_groups_create_post',
			'uses' 	=> 'Eubby\Controllers\Admin\GroupsController@postCreate'
			));

		Route::get('groups/edit/{id}', array(
			'as' 	=> 'admin_groups_edit',
			'uses' 	=> 'Eubby\Controllers\Admin\GroupsController@getEdit'
			));

		Route::post('groups/edit/{id}', array(
			'as' 	=> 'admin_groups_edit_post',
			'uses' 	=> 'Eubby\Controllers\Admin\GroupsController@postEdit'
			));

		Route::get('groups/delete/{id}', array(
			'as' 	=> 'admin_groups_delete',
			'uses' 	=> 'Eubby\Controllers\Admin\GroupsController@getDelete'
			));
});