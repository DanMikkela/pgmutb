using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class Country
    {
        public Country(string name, string currencyCode)
        {
            Name = name;
            CurrencyCode = currencyCode;
        }

        public Country(string currencyCode, int exchangeRate)
        {
            CurrencyCode = currencyCode;
            ExchangeRate = exchangeRate;
        }

        public Country()
        {
        }

        public int CountryId { get; set; }
        public string Name { get; set; }
        public string CurrencyCode { get; set; }
        public double ExchangeRate { get; set; }
        public List<Office> Offices { get; set; }
    }
}
