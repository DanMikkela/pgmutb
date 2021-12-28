using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace Cat_Show_Results.Models
{
    public class Judge
    {
        // unik nyckel MVC
        public int JudgeId { get; set; }
        //
        //  databasfält
        //
        [Required]
        public string Name { get; set; }
        [Required]
        public string Country { get; set; }
        public bool Category1 { get; set; }
        public bool Category2 { get; set; }
        public bool Category3 { get; set; }
        public bool Category4 { get; set; }
    }
}
