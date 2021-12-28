using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;
using Cat_Show_Results.Models;

namespace Cat_Show_Results.Models
{
    public class AppDbContext : IdentityDbContext
    {
        public AppDbContext(DbContextOptions<AppDbContext> options) : base(options)
        {

        }
        public DbSet<Class> Classes { get; set; }
        public DbSet<Cat> Cats { get; set; }
        public DbSet<Ticket> Tickets { get; set; }
        public DbSet<Judge> Judges { get; set; }
        public DbSet<Category> Categories { get; set; }
        public DbSet<Breed> Breeds { get; set; }
        public DbSet<Cat_Show_Results.Models.RoleViewModel> RoleViewModel { get; set; }
        public DbSet<Cat_Show_Results.Models.User> User { get; set; }

    }

}

