<? namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
		protected $fillable = ['name', 'display_name', 'description'];
		
		public function saveRoles($roles)
		{
				if(!empty($roles))
				{
						$this->roles()->sync($roles);
				} else {
						$this->roles()->detach();
				}
		}
}