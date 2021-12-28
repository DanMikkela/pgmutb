using System.Collections.Generic;

namespace Cat_Show_Results.Models
{
    public class RoleViewModel
    {
        public string Id { get; set; }
        public string Name { get; set; }
        public int NoOfRoleUsers { get; set; }
        public List<User> Users { get; set; }
    }
}
