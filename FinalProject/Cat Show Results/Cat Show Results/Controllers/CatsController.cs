using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using Cat_Show_Results.Models;
using Cat_Show_Results.ViewModels;
using System.Net.Sockets;
using Microsoft.AspNetCore.Authorization;

namespace Cat_Show_Results.Controllers
{
    public class CatsController : Controller
    {
        private readonly AppDbContext _context;

        public CatsController(AppDbContext context)
        {
            _context = context;
        }

        // GET: Cats
        public async Task<IActionResult> Index()
        {
            var appDbContext = _context.Cats;
            return View(await appDbContext.ToListAsync());
        }

        // GET: Cats/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var katt = await _context.Cats
                .Include(k => k.Breed)
                .FirstOrDefaultAsync(m => m.CatId == id);
            if (katt == null)
            {
                return NotFound();
            }
            Class currentClass = await _context.Classes.FindAsync(katt.ClassNr);
            Category currentCategory = await _context.Categories.FindAsync(katt.Category);
            ViewBag.Category = currentCategory.Name;
            ViewBag.Class = currentClass;

            return View(katt);
        }

        // GET: Cats/Create
        [Authorize(Roles = "Admin")]
        public IActionResult Create()
        {
            ViewData["BreedId"] = new SelectList(_context.Breeds, "BreedId", "Name");
            ViewData["CategoryCode"] = new SelectList(_context.Categories, "Code", "Name");
            return View();
        }

        // POST: Cats/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("CatId,Number,Name,BreedName,EMS,Sex,Born,ImageUrl,ClassNr,BreedId,Category ")] Cat cat)
        {
            if (ModelState.IsValid)
            {
                _context.Add(cat);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            ViewData["BreedId"] = new SelectList(_context.Breeds, "BreedId", "BreedId", cat.BreedId);
            return View(cat);
        }

        // GET: Cats/Edit/5
        [Authorize(Roles = "Admin")]

        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var cat = await _context.Cats.FindAsync(id);
            if (cat == null)
            {
                return NotFound();
            }
            ViewData["BreedId"] = new SelectList(_context.Breeds, "BreedId", "BreedId", cat.BreedId);
            return View(cat);
        }

        // POST: Cats/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("CatId,Number,Name,BreedName,EMS,Sex,Born,ImageUrl,ClassNr,BreedId,Category")] Cat cat)
        {
            if (id != cat.CatId)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(cat);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!CatExists(cat.CatId))
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
            ViewData["BreedId"] = new SelectList(_context.Breeds, "BreedId", "BreedId", cat.BreedId);
            return View(cat);
        }

        // GET: Cats/Delete/5
        [Authorize(Roles = "Admin")]

        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var cat = await _context.Cats
                .Include(k => k.Breed)
                .FirstOrDefaultAsync(m => m.CatId == id);
            if (cat == null)
            {
                return NotFound();
            }

            return View(cat);
        }

        // POST: Cats/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var cat = await _context.Cats.FindAsync(id);
            _context.Cats.Remove(cat);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        // GET: Cats/_Partial/5
        public async Task<IActionResult> _Partial(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var katt = await _context.Cats
                .Include(k => k.Breed)
                .FirstOrDefaultAsync(m => m.CatId == id);
            if (katt == null)
            {
                return NotFound();
            }

            return View(katt);
        }

        // GET: CatsToJudge/Judge
        public async Task<IActionResult> CatsToJudge(int? id)
        {
            List<Cat> cats = new List<Cat>();
            List<Cat> catsTmp = new List<Cat>();
            Judge currentJudge = _context.Judges.Where(m => m.JudgeId == id).FirstOrDefault();
            if (currentJudge.Category1) { catsTmp = await _context.Cats.Where(i => i.Category == 1).ToListAsync(); }
            cats.AddRange(catsTmp);
            catsTmp.Clear();
            if (currentJudge.Category2) { catsTmp = await _context.Cats.Where(i => i.Category == 2).ToListAsync(); }
            cats.AddRange(catsTmp);
            catsTmp.Clear();
            if (currentJudge.Category3) { catsTmp = await _context.Cats.Where(i => i.Category == 3).ToListAsync(); }
            cats.AddRange(catsTmp);
            catsTmp.Clear();
            if (currentJudge.Category4) { catsTmp = await _context.Cats.Where(i => i.Category == 4).ToListAsync(); }
            cats.AddRange(catsTmp);
            List<int> tickets = new List<int>(cats.Count);
            for (int i=0; i<cats.Count; i++)
            {
                var c = cats[i].CatId;
                Ticket currentTicket = _context.Tickets.Where( t => t.CatId == c).FirstOrDefault();
                tickets.Add(currentTicket.TicketId);
            }
            ViewBag.Tickets = tickets;
            //    var appDbContext = _context.Cats.Include(k => k.Breed);
            //    return View(await appDbContext.ToListAsync());
            return View(cats);
        }

        private bool CatExists(int id)
        {
            return _context.Cats.Any(e => e.CatId == id);
        }
    }
}
