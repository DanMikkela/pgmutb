using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp3
{
    public class Office
    {
        public Office(string location, string currCode)
        {
            Location = location;
            CurrCode = currCode;
        }

        public string Location { get; set; }
        public string CurrCode { get; set; }
    }
}
