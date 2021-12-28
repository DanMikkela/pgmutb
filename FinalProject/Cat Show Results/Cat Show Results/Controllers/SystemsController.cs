using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using Cat_Show_Results.Models;
using Microsoft.AspNetCore.Authorization;

namespace Cat_Show_Results.Controllers
{
    public class SystemsController : Controller
    {
        private readonly AppDbContext _context;

        public SystemsController(AppDbContext context)
        {
            _context = context;
        }

        // GET: Results
        [Authorize]
        public async Task<IActionResult> Index()
        {
            return View(await _context.Classes.ToListAsync());
        }
    }
}
