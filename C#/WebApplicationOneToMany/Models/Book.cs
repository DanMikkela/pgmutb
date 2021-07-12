﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplicationOneToMany.Models
{
    public class Book
    {
        public int Id { get; set; }
        public string Title { get; set; }

        /* Lazy loading 
           Eager loading */
        public virtual Author Author { get; set; }
        public virtual int AuthorId { get; set; }
    }
}
