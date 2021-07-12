using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Text;

namespace ConsoleAppEFStarter
{
    class MyDbContext : DbContext
    {
        public DbSet<Country> Countries { get; set; }

        public DbSet<Team> Teams { get; set; }

        string connectionString = "Server=DATOR\\SQLEXPRESS;Database=ConsoleAppEFStarter;Trusted_Connection=True;";
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer(connectionString);
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            /* Here we are adding seed data. 
             */
            modelBuilder.Entity<Country>().HasData(new Country { Id = 1, Name = "Sweden" });
            modelBuilder.Entity<Country>().HasData(new Country { Id = 2, Name = "Spain" });
            modelBuilder.Entity<Country>().HasData(new Country { Id = 3, Name = "England" });
        }
    }
}
