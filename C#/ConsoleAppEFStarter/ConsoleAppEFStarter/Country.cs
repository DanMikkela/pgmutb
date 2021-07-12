using System;
using System.Collections.Generic;
using System.Text;

namespace ConsoleAppEFStarter
{
    class Country
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public List<Team> Teams { get; set; }
    }
}
