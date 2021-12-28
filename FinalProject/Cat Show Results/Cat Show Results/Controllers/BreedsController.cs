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
    [Authorize(Roles = "Admin")]

    public class BreedsController : Controller
    {
        private readonly AppDbContext _context;

        public BreedsController(AppDbContext context)
        {
            _context = context;
        }

        // GET: Breeds
        public async Task<IActionResult> Index()
        {
            var appDbContext = _context.Breeds.Include(r => r.Categories);
            return View(await appDbContext.ToListAsync());
        }

        // GET: Breeds/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var ras = await _context.Breeds
                .Include(r => r.Categories)
                .FirstOrDefaultAsync(m => m.BreedId == id);
            if (ras == null)
            {
                return NotFound();
            }
            ViewBag.Category = ras.Categories;
            return View(ras);
        }

        // GET: Breeds/Create
        public IActionResult Create()
        {
            ViewData["CategoriId"] = new SelectList(_context.Categories, "CategoriId", "CategoriId");
            return View();
        }

        // POST: Breeds/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("BreedId,Name,EMS,CategoriId")] Breed ras)
        {
            if (ModelState.IsValid)
            {
                _context.Add(ras);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            ViewData["CategoriId"] = new SelectList(_context.Categories, "CategoriId", "CategoriId", ras.CategoryId);
            return View(ras);
        }

        // GET: Breeds/Edit/5
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var ras = await _context.Breeds.FindAsync(id);
            if (ras == null)
            {
                return NotFound();
            }
            ViewData["CategoriId"] = new SelectList(_context.Categories, "CategoriId", "CategoriId", ras.CategoryId);
            return View(ras);
        }

        // POST: Breeds/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("BreedId,Name,EMS,CategoriId")] Breed ras)
        {
            if (id != ras.BreedId)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(ras);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!RasExists(ras.BreedId))
                    {
                        return NotFound();
                    }
                    else
                    {
                        throw;
                    }
                }
                return RedirectToAction(nameof(Index));
            }
            ViewData["CategoriId"] = new SelectList(_context.Categories, "CategoriId", "CategoriId", ras.CategoryId);
            return View(ras);
        }

        // GET: Breeds/Delete/5
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var ras = await _context.Breeds
                .Include(r => r.Categories)
                .FirstOrDefaultAsync(m => m.BreedId == id);
            if (ras == null)
            {
                return NotFound();
            }

            return View(ras);
        }

        // POST: Breeds/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var ras = await _context.Breeds.FindAsync(id);
            _context.Breeds.Remove(ras);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool RasExists(int id)
        {
            return _context.Breeds.Any(e => e.BreedId == id);
        }
    }
}
