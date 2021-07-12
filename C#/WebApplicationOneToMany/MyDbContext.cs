using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using WebApplicationOneToMany.Models;

namespace WebApplicationOneToMany
{
    public class MyDbContext : DbContext
    {
        public DbSet<Author> Authors { get; set; }
        public DbSet<Book> Books { get; set; }
        /* This constructor must be added. */
        public MyDbContext(DbContextOptions<MyDbContext> options) : base(options)
        {

        }
        string connectionString = "Server=DATOR\\SQLEXPRESS;Database=WebApplicationOneToMany;Trusted_Connection=True;";
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            //optionsBuilder.UseSqlServer(connectionString);
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            /* Here we are adding seed data. 
             */
            modelBuilder.Entity<Author>().HasData(new Author { Id = 1, Name = "Jules Verne" });
            modelBuilder.Entity<Author>().HasData(new Author { Id = 2, Name = "Isaac Asimov" });
            modelBuilder.Entity<Author>().HasData(new Author { Id = 3, Name = "John Steinbeck" });
        }
    }
}
