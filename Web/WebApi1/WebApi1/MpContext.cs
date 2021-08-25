using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WebApi1
{
    public class MpContext : DbContext
    {
        // skapar tabeller från klasser
        public DbSet<Country> Countries { get; set; }
        public DbSet<Office> Offices { get; set; }
        public DbSet<Asset> Assets { get; set; }

        // connectionsträng till Sqlserver
        string connectionString = "Server=LAPTOP-HRM8SDK8\\SQLEXPRESS;Database=MiniProject;Trusted_Connection=True";

        // programstart koppla db
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer(connectionString);
        }

    }
}
