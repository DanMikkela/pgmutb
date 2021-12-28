using Microsoft.AspNetCore.Identity;
using System;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class User
    {
        public string Id { get; set; }
        public string UserName { get; set; }
        public bool HasRole { get; set; }
    }
}
