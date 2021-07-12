using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MP_Asset_EF
{
    public class ExchangeRate
    {
        public static double Read(MpContext db, string filnamn)
        {
            double usdRate = 0;
            bool existCountry = true;
            //  check for file
            var fileHandler = new FileHandler(filnamn);
            string[] fileRecords = File.ReadAllLines(filnamn);
            if (fileRecords.Length == 0)
            {
                Error.Msg("Fel på Valutafil!", filnamn);
                return 0;
            }
            //
            for (int i = 0; i < fileRecords.Length; i++)
            {
                
                string[] post = fileRecords[i].Split(";");
                double rate = double.Parse(post[2].Replace(".", ","));
                if (post[1] == "USD")
                {
                    usdRate = rate;
                }
                Country land = db.Countries.Where(c => c.CurrencyCode.Contains(post[1])).FirstOrDefault();
                if (land == null)
                {
                    // = ingen träff
                    land = new Country();
                    existCountry = false;
                }
                land.Name = post[0];
                land.CurrencyCode = post[1];
                land.ExchangeRate = rate;
                if (existCountry)
                {
                    db.Update(land);
                }
                else
                {
                    db.Add(land);
                }
                db.SaveChanges();
            }
            return usdRate;
        }



    }

}
