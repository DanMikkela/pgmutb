using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp2
{
    public class Produkt
    {
        public string Kategori { get; set; }
        public string ProduktNamn { get; set; }
        public int Pris { get; set; }

        public Produkt() { }

        public Produkt(string aKategori, string aProduktNamn)
        {
            Kategori = aKategori;
            ProduktNamn = aProduktNamn;
        }

        public Produkt(string aKategori, string aProduktNamn, int aPris) : this(aKategori, aProduktNamn)
        {
            Pris = aPris;
        }
    }
}
