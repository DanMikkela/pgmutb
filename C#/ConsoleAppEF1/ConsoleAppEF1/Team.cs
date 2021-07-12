using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppEF1
{
    class Team
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public Country Country { get; set; }
        public int CountryId { get; set; }
        // när Country-objektet ligger för id't så hanterar framework det som att Country är primärnyckel och Id som FK
    }
}
