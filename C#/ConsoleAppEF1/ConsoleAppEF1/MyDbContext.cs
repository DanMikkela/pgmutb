using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;

namespace ConsoleAppEF1
{
    class MyDbContext : DbContext
    {
        //
        // objekt för att hantera databaskopplingarna 
        //

        // skapa Tabellerna i databasen --------------------------------------------------------------------------
        public DbSet<Country>  Countries { get; set; }  //  objektet DbSet kopplar namnet för att kunna skapa Tabell 'Countries' i servern
        public DbSet<Team>  Teams { get; set; }         // skapar tabellen 'Teams'
        // --------------------------------------------------------------------------------------------------------
        // anslutningsinfo
        string connectionString = "Server=LAPTOP-HRM8SDK8\\SQLEXPRESS;Database=ConsoleAppEF1;Trusted_Connection=True";
        // 
        // --------------------------------------------------------------------------------------------------------
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)   // anropas automatiskt vid programstart, kopplar till databasen
        {
            optionsBuilder.UseSqlServer(connectionString);
        }
        protected override void OnModelCreating(ModelBuilder modelBuilder)  // model = "post/record description"
        {
            /* Here we are adding seed data.
            */
            modelBuilder.Entity<Country>().HasData(new Country { Id = 1, Name = "Sweden" });
            modelBuilder.Entity<Country>().HasData(new Country { Id = 2, Name = "Spain" });
            modelBuilder.Entity<Country>().HasData(new Country { Id = 3, Name = "England" });
        }
    }
}
