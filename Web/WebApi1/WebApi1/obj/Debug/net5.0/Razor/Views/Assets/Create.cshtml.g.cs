#pragma checksum "C:\Users\dan\PgmUtb\Web\WebApi1\WebApi1\Views\Assets\Create.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "732dcc62a777816188b55015fe767d8a4a1b69b6"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Assets_Create), @"mvc.1.0.view", @"/Views/Assets/Create.cshtml")]
namespace AspNetCore
{
    #line hidden
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    using Microsoft.AspNetCore.Mvc;
    using Microsoft.AspNetCore.Mvc.Rendering;
    using Microsoft.AspNetCore.Mvc.ViewFeatures;
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"732dcc62a777816188b55015fe767d8a4a1b69b6", @"/Views/Assets/Create.cshtml")]
    public class Views_Assets_Create : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<WebApi1.Asset>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 3 "C:\Users\dan\PgmUtb\Web\WebApi1\WebApi1\Views\Assets\Create.cshtml"
  
    ViewData["Title"] = "Create";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
<h1>Create</h1>

<h4>Asset</h4>
<hr />
<div class=""row"">
    <div class=""col-md-4"">
        <form asp-action=""Create"">
            <div asp-validation-summary=""ModelOnly"" class=""text-danger""></div>
            <div class=""form-group"">
                <label asp-for=""Type"" class=""control-label""></label>
                <input asp-for=""Type"" class=""form-control"" />
                <span asp-validation-for=""Type"" class=""text-danger""></span>
            </div>
            <div class=""form-group"">
                <label asp-for=""PurchaseDate"" class=""control-label""></label>
                <input asp-for=""PurchaseDate"" class=""form-control"" />
                <span asp-validation-for=""PurchaseDate"" class=""text-danger""></span>
            </div>
            <div class=""form-group"">
                <label asp-for=""Brand"" class=""control-label""></label>
                <input asp-for=""Brand"" class=""form-control"" />
                <span asp-validation-for=""Brand"" class=""text-danger""></span>
     ");
            WriteLiteral(@"       </div>
            <div class=""form-group"">
                <label asp-for=""Model"" class=""control-label""></label>
                <input asp-for=""Model"" class=""form-control"" />
                <span asp-validation-for=""Model"" class=""text-danger""></span>
            </div>
            <div class=""form-group"">
                <label asp-for=""Price"" class=""control-label""></label>
                <input asp-for=""Price"" class=""form-control"" />
                <span asp-validation-for=""Price"" class=""text-danger""></span>
            </div>
            <div class=""form-group"">
                <label asp-for=""Number"" class=""control-label""></label>
                <input asp-for=""Number"" class=""form-control"" />
                <span asp-validation-for=""Number"" class=""text-danger""></span>
            </div>
            <div class=""form-group"">
                <label asp-for=""OfficeId"" class=""control-label""></label>
                <select asp-for=""OfficeId"" class =""form-control"" asp-items=""ViewB");
            WriteLiteral(@"ag.OfficeId""></select>
            </div>
            <div class=""form-group"">
                <input type=""submit"" value=""Create"" class=""btn btn-primary"" />
            </div>
        </form>
    </div>
</div>

<div>
    <a asp-action=""Index"">Back to List</a>
</div>

");
            DefineSection("Scripts", async() => {
                WriteLiteral("\r\n");
#nullable restore
#line 61 "C:\Users\dan\PgmUtb\Web\WebApi1\WebApi1\Views\Assets\Create.cshtml"
      await Html.RenderPartialAsync("_ValidationScriptsPartial");

#line default
#line hidden
#nullable disable
            }
            );
        }
        #pragma warning restore 1998
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.ViewFeatures.IModelExpressionProvider ModelExpressionProvider { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IUrlHelper Url { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IViewComponentHelper Component { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IJsonHelper Json { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<WebApi1.Asset> Html { get; private set; }
    }
}
#pragma warning restore 1591
