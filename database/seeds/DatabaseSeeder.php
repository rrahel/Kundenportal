<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\HasRole;
use App\User;
use App\Role;
class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table ( 'users' )->delete ();
		DB::table ( 'roles' )->delete ();
		DB::table ( 'permissions' )->delete ();
		DB::table ( 'permission_role' )->delete ();
		
		// insert admin user
		DB::table ( 'users' )->insert ( [ 
				'name' => 'AdminUser',
				'email' => 'AdminUser@gmail.com',
				'password' => bcrypt ( 'password' ) 
		] );
		
		// insert normal user
		DB::table ( 'users' )->insert ( [ 
				'name' => 'ClientUser',
				'email' => 'ClientUser@gmail.com',
				'password' => bcrypt ( 'password' ) 
		] );
		
		// insert partner
		DB::table ( 'users' )->insert ( [
				'name' => 'PartnerUser',
				'email' => 'PartnerUser@gmail.com',
				'password' => bcrypt ( 'password' )
		] );
		
		// create admin role
		Role::firstOrCreate ( [ 
				'name' => 'Admin',
				'display_name' => 'Super Admin',
				'description' => 'The highest level of admin-ness' 
		] );
		
		// create client role
		Role::firstOrCreate ( [ 
				'name' => 'Kunde',
				'display_name' => 'Normal user',
				'description' => 'has restricted permissions' 
		] );
		
		// create partner role
		Role::firstOrCreate ( [
				'name' => 'Partner',
				'display_name' => 'Partner user',
				'description' => 'can see provisions'
		] );
		
		// add role admin to usre admin
		$superadmin = Role::where ( 'name', '=', 'Admin' )->first ();
		$admin = User::where ( 'name', '=', 'AdminUser' )->first ();
		
		if (! $admin->hasRole ( 'Admin' )) {
			$admin->attachRole ( $superadmin->id );
		}
		$this->command->info ( 'Admin user seeded :-)' );
		
		// add role client to user client
		$clientRole = Role::where ( 'name', '=', 'Kunde' )->first ();
		$client = User::where ( 'name', '=', 'ClientUser' )->first ();
		
		if (! $client->hasRole ( 'Kunde' )) {
			$client->attachRole ( $clientRole->id );
		}
		$this->command->info ( 'Client user seeded :-)' );
		
		// add role partner to user partner
		$partnerRole = Role::where ( 'name', '=', 'Partner' )->first ();
		$partner = User::where ( 'name', '=', 'PartnerUser' )->first ();
		
		if (! $partner->hasRole ( 'Partner' )) {
			$partner->attachRole ( $partnerRole->id );
		}
		$this->command->info ( 'partner user seeded :-)' );
		
		// insert permissions
		$permissions = array (
				array ( // 1
						'name' => 'can_read',
						'display_name' => 'can read data' 
				),
				array ( // 2
						'name' => 'can_edit',
						'display_name' => 'can edit data' 
				) ,
				array ( // 3
						'name' => 'see_provisions',
						'display_name' => 'can see provisions' 
				) 
		);
		
		DB::table ( 'permissions' )->insert ( $permissions );
		$this->command->info ( 'permissions seeded :-)' );
		
		// insert permissions into roles
		$role_id_admin = Role::where ( 'name', '=', 'Admin' )->first ()->id;
		$role_id_client = Role::where ( 'name', '=', 'Kunde' )->first ()->id;
		$role_id_partner = Role::where ( 'name', '=', 'Partner' )->first ()->id;
		
		$permission_base = ( int ) DB::table ( 'permissions' )->first ()->id - 1;
		
		$permissions = array (
				array (
						'role_id' => $role_id_admin,
						'permission_id' => $permission_base + 1 
				),
				array (
						'role_id' => $role_id_admin,
						'permission_id' => $permission_base + 2 
				),
				array (
						'role_id' => $role_id_admin,
						'permission_id' => $permission_base + 3 
				),
				array (
						'role_id' => $role_id_client,
						'permission_id' => $permission_base + 1 
				),
				array (
						'role_id' => $role_id_partner,
						'permission_id' => $permission_base + 1
				),
				array (
						'role_id' => $role_id_partner,
						'permission_id' => $permission_base + 3
				)
		);
		
		DB::table ( 'permission_role' )->insert ( $permissions );
		
		$this->command->info ( 'permissions to roles seeded :-)' );
	}
}
