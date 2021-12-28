using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Cat_Show_Results.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;


namespace Cat_Show_Results.Controllers
{
    [Authorize (Roles="Admin")]
    public class RolesController : Controller
    {
        private readonly UserManager<IdentityUser> _userManager;
        private readonly RoleManager<IdentityRole> _roleManager;

        public RolesController(UserManager<IdentityUser> userManager, RoleManager<IdentityRole> roleManager)
        {
            _userManager = userManager;
            _roleManager = roleManager;
        }

        // GET: Roles
        public async Task<IActionResult> Index()
        {
            //return View(await _context.Roles.ToListAsync());
            var rolesMan = await _roleManager.Roles.ToListAsync();
            var usersMan = await _userManager.Users.ToListAsync();
            var NoOfUsers = 0;

            List<RoleViewModel> roles = new List<RoleViewModel>();
            foreach (var roleMan in rolesMan)
            {
                List<User> users = new List<User>();
                foreach (var userMan in usersMan)
                {
                    User user = new User()
                    {
                        Id = userMan.Id,
                        UserName = userMan.UserName,
                        HasRole = await _userManager.IsInRoleAsync(userMan, roleMan.Name)
                    };
                    users.Add(user);
                }
                for (int i=0; i < users.Count; i++)
                {
                    if (users[i].HasRole)
                    {
                        NoOfUsers++;
                    }
                }

                RoleViewModel role = new RoleViewModel()
                {
                    Id = roleMan.Id,
                    Name = roleMan.Name,
                    Users = users,
                    NoOfRoleUsers = NoOfUsers
                };
                roles.Add(role);
                NoOfUsers = 0;
            }

            //return View(await _roleManager.Roles.ToListAsync());
            return View(roles);
        }

        // GET: Roles/Details/5
        public async Task<IActionResult> Details(Guid? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            //var role = await _context.Roles
            //    .FirstOrDefaultAsync(m => m.Id == id);
            var roleMan = await _roleManager.FindByIdAsync(id.ToString());
            var usersMan = await _userManager.Users.ToListAsync();
            List<User> users = new List<User>();
            var NoOfUsers = 0;

            foreach (var userMan in usersMan)
            {
                User user = new User()
                {
                    Id = userMan.Id,
                    UserName = userMan.UserName,
                    HasRole = await _userManager.IsInRoleAsync(userMan, roleMan.Name)
                };
                users.Add(user);
            }
            for (int i = 0; i < users.Count; i++)
            {
                if (users[i].HasRole)
                {
                    NoOfUsers++;
                }
            }
            RoleViewModel role = new RoleViewModel()
            {
                Id = roleMan.Id,
                Name = roleMan.Name,
                Users = users,
                NoOfRoleUsers= NoOfUsers
            };
            if (role == null)
            {
                return NotFound();
            }

            return View(role);
        }

        // GET: Roles/Create
        public async Task<IActionResult> Create()
        {
            var usersMan = await _userManager.Users.ToListAsync();
            List<User> users = new List<User>();
            foreach (var userMan in usersMan)
            {
                User user = new User()
                {
                    Id = userMan.Id,
                    UserName = userMan.UserName,
                    HasRole = false
                };
                users.Add(user);
            }
            RoleViewModel role = new RoleViewModel()
            {
                Id = null,
                Name = null,
                Users = users
            };
            return View(role);
        }

        // POST: Roles/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("Id,Name,Users")] RoleViewModel  role)
        {
            if (ModelState.IsValid)
            {
                //role.Id = Guid.NewGuid();
                //await _roleManager.CreateAsync(role);
                var roleMan = new IdentityRole();
                roleMan.Name = role.Name;
                await _roleManager.CreateAsync(roleMan);

                // ta bort tilldelning av rollen till alla Users
                    //var usersMan = await _userManager.Users.ToListAsync();
                    //foreach (User user in role.Users)
                    //{
                    //    await _userManager.AddToRoleAsync(await _userManager.FindByNameAsync(user.UserName), role.Name);
                    //}
                    //_context.Add(role);
                    //await _context.SaveChangesAsync();

                return RedirectToAction(nameof(Index));
            }
            return View(role);
        }

        // GET: Roles/Edit/5
        public async Task<IActionResult> Edit(Guid? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var roleMan = await _roleManager.FindByIdAsync(id.ToString());
            var usersMan = await _userManager.Users.ToListAsync();
            List<User> users = new List<User>();
            foreach (var userMan in usersMan)
            {
                User user = new User()
                {
                    Id = userMan.Id,
                    UserName = userMan.UserName,
                    HasRole = await _userManager.IsInRoleAsync(userMan, roleMan.Name)
                };
                users.Add(user);
            }
            RoleViewModel role = new RoleViewModel()
            {
                Id = roleMan.Id,
                Name = roleMan.Name,
                Users = users
            };

            if (role == null)
            {
                return NotFound();
            }
            return View(role);
        }

        // POST: Roles/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(Guid id, [Bind("Id,Name,Users")] RoleViewModel role)
        {
            if (id.ToString() != role.Id)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    var roleMan = await _roleManager.FindByIdAsync(id.ToString());
                    roleMan.Name = role.Name;
                    var usersMan = await _userManager.Users.ToListAsync();
                    foreach (User user in role.Users)
                    {
                        if (user.HasRole)
                        {
                            if (!await _userManager.IsInRoleAsync(await _userManager.FindByNameAsync(user.UserName), role.Name))
                            {
                                await _userManager.AddToRoleAsync(await _userManager.FindByNameAsync(user.UserName), role.Name);
                            }
                        }
                        else
                        {
                            if (await _userManager.IsInRoleAsync(await _userManager.FindByNameAsync(user.UserName), role.Name))
                            {
                                await _userManager.RemoveFromRoleAsync(await _userManager.FindByNameAsync(user.UserName), role.Name);
                            }
                        }

                    }
                    await _roleManager.UpdateAsync(roleMan);
                    //_context.Update(role);
                    //await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!RoleExists(role.Id))
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
            return View(role);
        }

        // GET: Roles/Delete/5
        public async Task<IActionResult> Delete(Guid? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            //var role = await _context.Roles
            //    .FirstOrDefaultAsync(m => m.Id == id);
            var role = await _roleManager.FindByIdAsync(id.ToString());
            if (role == null)
            {
                return NotFound();
            }

            return View(role);
        }

        // POST: Roles/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(Guid id)
        {
            //var role = await _context.Roles.FindAsync(id);
            var role = await _roleManager.FindByIdAsync(id.ToString());
            //_context.Roles.Remove(role);
            //await _context.SaveChangesAsync();
            await _roleManager.DeleteAsync(role);
            return RedirectToAction(nameof(Index));
        }

        private bool RoleExists(string id)
        {
            //return _context.Roles.Any(e => e.Id == id);
            var role = _roleManager.FindByIdAsync(id);
            return role != null;
        }
    }
}
