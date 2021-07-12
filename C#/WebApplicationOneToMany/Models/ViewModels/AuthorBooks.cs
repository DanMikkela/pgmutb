using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplicationOneToMany.Models.ViewModels
{
    public class AuthorBooks
    {
        public Author Author { get; set; }
        public List<Book> Books { get; set; }
    }
}
