using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class Office
    {
        public Office()
        {
        }

        public Office(int countryId, string location)
        {
            CountryId = countryId;
            Location = location;
        }

        public int OfficeId { get; set; }
        public string Location { get; set; }
        // koppla upp till Country (ägare)
        public Country Country { get; set; }
        public int CountryId { get; set; }
        // koppla nedåt till Assets (medlemmar)
        public List<Asset> Assets { get; set; }
    }
}
