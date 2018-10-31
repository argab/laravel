
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_ForgotPasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/ForgotPasswordController.html">ForgotPasswordController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_LoginController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/LoginController.html">LoginController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_RegisterController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/RegisterController.html">RegisterController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_ResetPasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/ResetPasswordController.html">ResetPasswordController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_VerificationController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/VerificationController.html">VerificationController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_ApiController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/ApiController.html">ApiController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_CompanyController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/CompanyController.html">CompanyController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_UserController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/UserController.html">UserController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_Authenticate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Authenticate.html">Authenticate</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_CheckForMaintenanceMode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/CheckForMaintenanceMode.html">CheckForMaintenanceMode</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_TrimStrings" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/TrimStrings.html">TrimStrings</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_TrustProxies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/TrustProxies.html">TrustProxies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_BroadcastServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/BroadcastServiceProvider.html">BroadcastServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_lib" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/lib.html">lib</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_lib_grid" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/lib/grid.html">grid</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_lib_grid_plugins" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/lib/grid/plugins.html">plugins</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_lib_grid_plugins_pagination" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/lib/grid/plugins/pagination.html">pagination</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_lib_grid_plugins_pagination_Pagination" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="App/lib/grid/plugins/pagination/Pagination.html">Pagination</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                            <li data-name="class:App_lib_grid_Grid" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/Grid.html">Grid</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_GridData" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/GridData.html">GridData</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_GridDataFormatter" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/GridDataFormatter.html">GridDataFormatter</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_GridDataProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/GridDataProvider.html">GridDataProvider</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_GridForm" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/GridForm.html">GridForm</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_GridTable" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/GridTable.html">GridTable</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_GridView" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/GridView.html">GridView</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_IGrid" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/IGrid.html">IGrid</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_IGridData" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/IGridData.html">IGridData</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_IGridFormProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/IGridFormProvider.html">IGridFormProvider</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_IGridProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/IGridProvider.html">IGridProvider</a>                    </div>                </li>                            <li data-name="class:App_lib_grid_IGridTableProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/lib/grid/IGridTableProvider.html">IGridTableProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_traits" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/traits.html">traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_traits_TGrid" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/traits/TGrid.html">TGrid</a>                    </div>                </li>                            <li data-name="class:App_traits_TModel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/traits/TModel.html">TModel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Api" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Api.html">Api</a>                    </div>                </li>                            <li data-name="class:App_Company" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Company.html">Company</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},{"type": "Namespace", "link": "App/lib.html", "name": "App\\lib", "doc": "Namespace App\\lib"},{"type": "Namespace", "link": "App/lib/grid.html", "name": "App\\lib\\grid", "doc": "Namespace App\\lib\\grid"},{"type": "Namespace", "link": "App/lib/grid/plugins.html", "name": "App\\lib\\grid\\plugins", "doc": "Namespace App\\lib\\grid\\plugins"},{"type": "Namespace", "link": "App/lib/grid/plugins/pagination.html", "name": "App\\lib\\grid\\plugins\\pagination", "doc": "Namespace App\\lib\\grid\\plugins\\pagination"},{"type": "Namespace", "link": "App/traits.html", "name": "App\\traits", "doc": "Namespace App\\traits"},
            {"type": "Interface", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGrid.html", "name": "App\\lib\\grid\\IGrid", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGrid", "fromLink": "App/lib/grid/IGrid.html", "link": "App/lib/grid/IGrid.html#method_setRenderPath", "name": "App\\lib\\grid\\IGrid::setRenderPath", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGrid", "fromLink": "App/lib/grid/IGrid.html", "link": "App/lib/grid/IGrid.html#method_render", "name": "App\\lib\\grid\\IGrid::render", "doc": "&quot;&quot;"},
            
            {"type": "Interface", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridData.html", "name": "App\\lib\\grid\\IGridData", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridData", "fromLink": "App/lib/grid/IGridData.html", "link": "App/lib/grid/IGridData.html#method_fetchFields", "name": "App\\lib\\grid\\IGridData::fetchFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridData", "fromLink": "App/lib/grid/IGridData.html", "link": "App/lib/grid/IGridData.html#method_fetchItems", "name": "App\\lib\\grid\\IGridData::fetchItems", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridData", "fromLink": "App/lib/grid/IGridData.html", "link": "App/lib/grid/IGridData.html#method_fetchCount", "name": "App\\lib\\grid\\IGridData::fetchCount", "doc": "&quot;&quot;"},
            
            {"type": "Interface", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridFormProvider.html", "name": "App\\lib\\grid\\IGridFormProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputTypes", "name": "App\\lib\\grid\\IGridFormProvider::gridInputTypes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputSizes", "name": "App\\lib\\grid\\IGridFormProvider::gridInputSizes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputOptions", "name": "App\\lib\\grid\\IGridFormProvider::gridInputOptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputPrompts", "name": "App\\lib\\grid\\IGridFormProvider::gridInputPrompts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputErrors", "name": "App\\lib\\grid\\IGridFormProvider::gridInputErrors", "doc": "&quot;&quot;"},
            
            {"type": "Interface", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridProvider.html", "name": "App\\lib\\grid\\IGridProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridProvider", "fromLink": "App/lib/grid/IGridProvider.html", "link": "App/lib/grid/IGridProvider.html#method_gridFields", "name": "App\\lib\\grid\\IGridProvider::gridFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridProvider", "fromLink": "App/lib/grid/IGridProvider.html", "link": "App/lib/grid/IGridProvider.html#method_gridSafeFields", "name": "App\\lib\\grid\\IGridProvider::gridSafeFields", "doc": "&quot;&quot;"},
            
            {"type": "Interface", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridTableProvider.html", "name": "App\\lib\\grid\\IGridTableProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridTableProvider", "fromLink": "App/lib/grid/IGridTableProvider.html", "link": "App/lib/grid/IGridTableProvider.html#method_gridTableCellPrompts", "name": "App\\lib\\grid\\IGridTableProvider::gridTableCellPrompts", "doc": "&quot;&quot;"},
            
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Api.html", "name": "App\\Api", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_setAuthUrl", "name": "App\\Api::setAuthUrl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_setToken", "name": "App\\Api::setToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_getToken", "name": "App\\Api::getToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_checkToken", "name": "App\\Api::checkToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_fetchCurl", "name": "App\\Api::fetchCurl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_getCurl", "name": "App\\Api::getCurl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_curlGet", "name": "App\\Api::curlGet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Api", "fromLink": "App/Api.html", "link": "App/Api.html#method_curlPost", "name": "App\\Api::curlPost", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Company.html", "name": "App\\Company", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Company", "fromLink": "App/Company.html", "link": "App/Company.html#method_users", "name": "App\\Company::users", "doc": "&quot;The Company`s many to many Users Relationship.&quot;"},
                    {"type": "Method", "fromName": "App\\Company", "fromLink": "App/Company.html", "link": "App/Company.html#method_gridFields", "name": "App\\Company::gridFields", "doc": "&quot;The list of Company`s data fields, required for displaying data in the layout&quot;"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Kernel", "fromLink": "App/Console/Kernel.html", "link": "App/Console/Kernel.html#method_schedule", "name": "App\\Console\\Kernel::schedule", "doc": "&quot;Define the application&#039;s command schedule.&quot;"},
                    {"type": "Method", "fromName": "App\\Console\\Kernel", "fromLink": "App/Console/Kernel.html", "link": "App/Console/Kernel.html#method_commands", "name": "App\\Console\\Kernel::commands", "doc": "&quot;Register the commands for the application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/ApiController.html", "name": "App\\Http\\Controllers\\ApiController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method___construct", "name": "App\\Http\\Controllers\\ApiController::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_index", "name": "App\\Http\\Controllers\\ApiController::index", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_search", "name": "App\\Http\\Controllers\\ApiController::search", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_getOffers", "name": "App\\Http\\Controllers\\ApiController::getOffers", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ApiController", "fromLink": "App/Http/Controllers/ApiController.html", "link": "App/Http/Controllers/ApiController.html#method_searchOptions", "name": "App\\Http\\Controllers\\ApiController::searchOptions", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/ForgotPasswordController.html", "name": "App\\Http\\Controllers\\Auth\\ForgotPasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\ForgotPasswordController", "fromLink": "App/Http/Controllers/Auth/ForgotPasswordController.html", "link": "App/Http/Controllers/Auth/ForgotPasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\ForgotPasswordController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/LoginController.html", "name": "App\\Http\\Controllers\\Auth\\LoginController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\LoginController", "fromLink": "App/Http/Controllers/Auth/LoginController.html", "link": "App/Http/Controllers/Auth/LoginController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\LoginController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/RegisterController.html", "name": "App\\Http\\Controllers\\Auth\\RegisterController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\RegisterController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method_validator", "name": "App\\Http\\Controllers\\Auth\\RegisterController::validator", "doc": "&quot;Get a validator for an incoming registration request.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method_create", "name": "App\\Http\\Controllers\\Auth\\RegisterController::create", "doc": "&quot;Create a new user instance after a valid registration.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/ResetPasswordController.html", "name": "App\\Http\\Controllers\\Auth\\ResetPasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\ResetPasswordController", "fromLink": "App/Http/Controllers/Auth/ResetPasswordController.html", "link": "App/Http/Controllers/Auth/ResetPasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\ResetPasswordController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/VerificationController.html", "name": "App\\Http\\Controllers\\Auth\\VerificationController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\VerificationController", "fromLink": "App/Http/Controllers/Auth/VerificationController.html", "link": "App/Http/Controllers/Auth/VerificationController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\VerificationController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/CompanyController.html", "name": "App\\Http\\Controllers\\CompanyController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\CompanyController", "fromLink": "App/Http/Controllers/CompanyController.html", "link": "App/Http/Controllers/CompanyController.html#method_index", "name": "App\\Http\\Controllers\\CompanyController::index", "doc": "&quot;Display a listing of the Companies.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/UserController.html", "name": "App\\Http\\Controllers\\UserController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_index", "name": "App\\Http\\Controllers\\UserController::index", "doc": "&quot;Display a listing of the Users.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_create", "name": "App\\Http\\Controllers\\UserController::create", "doc": "&quot;Display the form for creating a new User;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_attachCompany", "name": "App\\Http\\Controllers\\UserController::attachCompany", "doc": "&quot;Attach\/Detach the specified User to Company and vice versa.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_update", "name": "App\\Http\\Controllers\\UserController::update", "doc": "&quot;Display the form for updating specified User;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\UserController", "fromLink": "App/Http/Controllers/UserController.html", "link": "App/Http/Controllers/UserController.html#method_destroy", "name": "App\\Http\\Controllers\\UserController::destroy", "doc": "&quot;Remove the specified resource from storage.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Authenticate.html", "name": "App\\Http\\Middleware\\Authenticate", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Authenticate", "fromLink": "App/Http/Middleware/Authenticate.html", "link": "App/Http/Middleware/Authenticate.html#method_redirectTo", "name": "App\\Http\\Middleware\\Authenticate::redirectTo", "doc": "&quot;Get the path the user should be redirected to when they are not authenticated.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/CheckForMaintenanceMode.html", "name": "App\\Http\\Middleware\\CheckForMaintenanceMode", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/TrimStrings.html", "name": "App\\Http\\Middleware\\TrimStrings", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/TrustProxies.html", "name": "App\\Http\\Middleware\\TrustProxies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/BroadcastServiceProvider.html", "name": "App\\Providers\\BroadcastServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\BroadcastServiceProvider", "fromLink": "App/Providers/BroadcastServiceProvider.html", "link": "App/Providers/BroadcastServiceProvider.html#method_boot", "name": "App\\Providers\\BroadcastServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapWebRoutes", "name": "App\\Providers\\RouteServiceProvider::mapWebRoutes", "doc": "&quot;Define the \&quot;web\&quot; routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapApiRoutes", "name": "App\\Providers\\RouteServiceProvider::mapApiRoutes", "doc": "&quot;Define the \&quot;api\&quot; routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_companies", "name": "App\\User::companies", "doc": "&quot;The Users many to many Companies Relationship.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getCompanies", "name": "App\\User::getCompanies", "doc": "&quot;Fetches the list of companies to which specified user has related to.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_rules", "name": "App\\User::rules", "doc": "&quot;The validation rules&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_gridFields", "name": "App\\User::gridFields", "doc": "&quot;The list of User`s data fields, required for displaying data in the layout&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_gridInputTypes", "name": "App\\User::gridInputTypes", "doc": "&quot;List of fields required for generating input fields with specified input types,\nin the edit \/ create \/ filter forms.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_gridInputOptions", "name": "App\\User::gridInputOptions", "doc": "&quot;List of fields required for generating input fields of the type \&quot;select, checkbox, radio\&quot;,\nindicating what data they use, in the edit \/ create forms.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_gridInputErrors", "name": "App\\User::gridInputErrors", "doc": "&quot;The property is used to display errors that occurred during the validation of data fields.&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/Grid.html", "name": "App\\lib\\grid\\Grid", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method___construct", "name": "App\\lib\\grid\\Grid::__construct", "doc": "&quot;Grid constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getProvider", "name": "App\\lib\\grid\\Grid::getProvider", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getEntity", "name": "App\\lib\\grid\\Grid::getEntity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getEntityName", "name": "App\\lib\\grid\\Grid::getEntityName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getEntityProp", "name": "App\\lib\\grid\\Grid::getEntityProp", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setItems", "name": "App\\lib\\grid\\Grid::setItems", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getItems", "name": "App\\lib\\grid\\Grid::getItems", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_checkField", "name": "App\\lib\\grid\\Grid::checkField", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setFields", "name": "App\\lib\\grid\\Grid::setFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getFields", "name": "App\\lib\\grid\\Grid::getFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getField", "name": "App\\lib\\grid\\Grid::getField", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPrompt", "name": "App\\lib\\grid\\Grid::setPrompt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPrompts", "name": "App\\lib\\grid\\Grid::setPrompts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getPrompt", "name": "App\\lib\\grid\\Grid::getPrompt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setRow", "name": "App\\lib\\grid\\Grid::setRow", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getRows", "name": "App\\lib\\grid\\Grid::getRows", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_checkRow", "name": "App\\lib\\grid\\Grid::checkRow", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getRow", "name": "App\\lib\\grid\\Grid::getRow", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_unsetFields", "name": "App\\lib\\grid\\Grid::unsetFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setRenderPath", "name": "App\\lib\\grid\\Grid::setRenderPath", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getRenderPath", "name": "App\\lib\\grid\\Grid::getRenderPath", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setRenderTemplate", "name": "App\\lib\\grid\\Grid::setRenderTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setTemplate", "name": "App\\lib\\grid\\Grid::setTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getTemplate", "name": "App\\lib\\grid\\Grid::getTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_checkRowTemplate", "name": "App\\lib\\grid\\Grid::checkRowTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getRowTemplate", "name": "App\\lib\\grid\\Grid::getRowTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setLayout", "name": "App\\lib\\grid\\Grid::setLayout", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getLayout", "name": "App\\lib\\grid\\Grid::getLayout", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_bindLayout", "name": "App\\lib\\grid\\Grid::bindLayout", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getLayoutBindings", "name": "App\\lib\\grid\\Grid::getLayoutBindings", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_fetchLayout", "name": "App\\lib\\grid\\Grid::fetchLayout", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setTag", "name": "App\\lib\\grid\\Grid::setTag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getTag", "name": "App\\lib\\grid\\Grid::getTag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setTagAttributes", "name": "App\\lib\\grid\\Grid::setTagAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getTagAttributes", "name": "App\\lib\\grid\\Grid::getTagAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setRowAttributes", "name": "App\\lib\\grid\\Grid::setRowAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getRowAttributes", "name": "App\\lib\\grid\\Grid::getRowAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setSortOrder", "name": "App\\lib\\grid\\Grid::setSortOrder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setReplaceOrder", "name": "App\\lib\\grid\\Grid::setReplaceOrder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_fetchSortOrder", "name": "App\\lib\\grid\\Grid::fetchSortOrder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getSortOrder", "name": "App\\lib\\grid\\Grid::getSortOrder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPlugin", "name": "App\\lib\\grid\\Grid::setPlugin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPlugins", "name": "App\\lib\\grid\\Grid::setPlugins", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getPlugin", "name": "App\\lib\\grid\\Grid::getPlugin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setRequiredPluginParams", "name": "App\\lib\\grid\\Grid::setRequiredPluginParams", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getRequiredPluginParams", "name": "App\\lib\\grid\\Grid::getRequiredPluginParams", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_checkRequiredPluginParams", "name": "App\\lib\\grid\\Grid::checkRequiredPluginParams", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPluginConfig", "name": "App\\lib\\grid\\Grid::setPluginConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getPluginConfig", "name": "App\\lib\\grid\\Grid::getPluginConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPluginData", "name": "App\\lib\\grid\\Grid::setPluginData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getPluginData", "name": "App\\lib\\grid\\Grid::getPluginData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getPluginInstance", "name": "App\\lib\\grid\\Grid::getPluginInstance", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_fetchPlugin", "name": "App\\lib\\grid\\Grid::fetchPlugin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_fetchPlugins", "name": "App\\lib\\grid\\Grid::fetchPlugins", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPluginFetched", "name": "App\\lib\\grid\\Grid::setPluginFetched", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_checkPluginFetched", "name": "App\\lib\\grid\\Grid::checkPluginFetched", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_pluginHook", "name": "App\\lib\\grid\\Grid::pluginHook", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_setPluginFetchPaths", "name": "App\\lib\\grid\\Grid::setPluginFetchPaths", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_getPluginFetchPath", "name": "App\\lib\\grid\\Grid::getPluginFetchPath", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\Grid", "fromLink": "App/lib/grid/Grid.html", "link": "App/lib/grid/Grid.html#method_render", "name": "App\\lib\\grid\\Grid::render", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/GridData.html", "name": "App\\lib\\grid\\GridData", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_setPdo", "name": "App\\lib\\grid\\GridData::setPdo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_getPdo", "name": "App\\lib\\grid\\GridData::getPdo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_setTable", "name": "App\\lib\\grid\\GridData::setTable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_getTable", "name": "App\\lib\\grid\\GridData::getTable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_setQuery", "name": "App\\lib\\grid\\GridData::setQuery", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_getQuery", "name": "App\\lib\\grid\\GridData::getQuery", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_fetchFields", "name": "App\\lib\\grid\\GridData::fetchFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_fetchCount", "name": "App\\lib\\grid\\GridData::fetchCount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridData", "fromLink": "App/lib/grid/GridData.html", "link": "App/lib/grid/GridData.html#method_fetchItems", "name": "App\\lib\\grid\\GridData::fetchItems", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/GridDataFormatter.html", "name": "App\\lib\\grid\\GridDataFormatter", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\GridDataFormatter", "fromLink": "App/lib/grid/GridDataFormatter.html", "link": "App/lib/grid/GridDataFormatter.html#method_dashName", "name": "App\\lib\\grid\\GridDataFormatter::dashName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataFormatter", "fromLink": "App/lib/grid/GridDataFormatter.html", "link": "App/lib/grid/GridDataFormatter.html#method_setAttribute", "name": "App\\lib\\grid\\GridDataFormatter::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataFormatter", "fromLink": "App/lib/grid/GridDataFormatter.html", "link": "App/lib/grid/GridDataFormatter.html#method_getAttributes", "name": "App\\lib\\grid\\GridDataFormatter::getAttributes", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/GridDataProvider.html", "name": "App\\lib\\grid\\GridDataProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method___construct", "name": "App\\lib\\grid\\GridDataProvider::__construct", "doc": "&quot;GridDataProvider constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_setEntity", "name": "App\\lib\\grid\\GridDataProvider::setEntity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_getEntity", "name": "App\\lib\\grid\\GridDataProvider::getEntity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_setData", "name": "App\\lib\\grid\\GridDataProvider::setData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_setConfig", "name": "App\\lib\\grid\\GridDataProvider::setConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_getConfig", "name": "App\\lib\\grid\\GridDataProvider::getConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_setCount", "name": "App\\lib\\grid\\GridDataProvider::setCount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_getCount", "name": "App\\lib\\grid\\GridDataProvider::getCount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_setPage", "name": "App\\lib\\grid\\GridDataProvider::setPage", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_getPage", "name": "App\\lib\\grid\\GridDataProvider::getPage", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_fetchFields", "name": "App\\lib\\grid\\GridDataProvider::fetchFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_fetchCount", "name": "App\\lib\\grid\\GridDataProvider::fetchCount", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_fetchItems", "name": "App\\lib\\grid\\GridDataProvider::fetchItems", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_getItems", "name": "App\\lib\\grid\\GridDataProvider::getItems", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridFields", "name": "App\\lib\\grid\\GridDataProvider::gridFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridSafeFields", "name": "App\\lib\\grid\\GridDataProvider::gridSafeFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridInputTypes", "name": "App\\lib\\grid\\GridDataProvider::gridInputTypes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridInputOptions", "name": "App\\lib\\grid\\GridDataProvider::gridInputOptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridInputSizes", "name": "App\\lib\\grid\\GridDataProvider::gridInputSizes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridInputPrompts", "name": "App\\lib\\grid\\GridDataProvider::gridInputPrompts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridInputErrors", "name": "App\\lib\\grid\\GridDataProvider::gridInputErrors", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridDataProvider", "fromLink": "App/lib/grid/GridDataProvider.html", "link": "App/lib/grid/GridDataProvider.html#method_gridTableCellPrompts", "name": "App\\lib\\grid\\GridDataProvider::gridTableCellPrompts", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/GridForm.html", "name": "App\\lib\\grid\\GridForm", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method___construct", "name": "App\\lib\\grid\\GridForm::__construct", "doc": "&quot;GridForm constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setForm", "name": "App\\lib\\grid\\GridForm::setForm", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputRequestName", "name": "App\\lib\\grid\\GridForm::setInputRequestName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputRequestName", "name": "App\\lib\\grid\\GridForm::getInputRequestName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputName", "name": "App\\lib\\grid\\GridForm::getInputName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setPrefixID", "name": "App\\lib\\grid\\GridForm::setPrefixID", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getPrefixedInputID", "name": "App\\lib\\grid\\GridForm::getPrefixedInputID", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputID", "name": "App\\lib\\grid\\GridForm::setInputID", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputID", "name": "App\\lib\\grid\\GridForm::getInputID", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_loadInput", "name": "App\\lib\\grid\\GridForm::loadInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_loadInputs", "name": "App\\lib\\grid\\GridForm::loadInputs", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_switchInputType", "name": "App\\lib\\grid\\GridForm::switchInputType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setSizes", "name": "App\\lib\\grid\\GridForm::setSizes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setMaxTextInputSize", "name": "App\\lib\\grid\\GridForm::setMaxTextInputSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setValues", "name": "App\\lib\\grid\\GridForm::setValues", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputType", "name": "App\\lib\\grid\\GridForm::setInputType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputType", "name": "App\\lib\\grid\\GridForm::getInputType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_checkInput", "name": "App\\lib\\grid\\GridForm::checkInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInput", "name": "App\\lib\\grid\\GridForm::getInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setError", "name": "App\\lib\\grid\\GridForm::setError", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getError", "name": "App\\lib\\grid\\GridForm::getError", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_unsetInput", "name": "App\\lib\\grid\\GridForm::unsetInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_unsetInputs", "name": "App\\lib\\grid\\GridForm::unsetInputs", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputKeys", "name": "App\\lib\\grid\\GridForm::getInputKeys", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputTag", "name": "App\\lib\\grid\\GridForm::setInputTag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setValue", "name": "App\\lib\\grid\\GridForm::setValue", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputValue", "name": "App\\lib\\grid\\GridForm::getInputValue", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_isOptionalInput", "name": "App\\lib\\grid\\GridForm::isOptionalInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputOptions", "name": "App\\lib\\grid\\GridForm::setInputOptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputOptions", "name": "App\\lib\\grid\\GridForm::getInputOptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setLabel", "name": "App\\lib\\grid\\GridForm::setLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getLabel", "name": "App\\lib\\grid\\GridForm::getLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setLabelAttributes", "name": "App\\lib\\grid\\GridForm::setLabelAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getLabelAttributes", "name": "App\\lib\\grid\\GridForm::getLabelAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getLabels", "name": "App\\lib\\grid\\GridForm::getLabels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setLabels", "name": "App\\lib\\grid\\GridForm::setLabels", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setLabelTemplate", "name": "App\\lib\\grid\\GridForm::setLabelTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getLabelTemplate", "name": "App\\lib\\grid\\GridForm::getLabelTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setToken", "name": "App\\lib\\grid\\GridForm::setToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getTokenValue", "name": "App\\lib\\grid\\GridForm::getTokenValue", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getTokenName", "name": "App\\lib\\grid\\GridForm::getTokenName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_inputUnwrap", "name": "App\\lib\\grid\\GridForm::inputUnwrap", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_hideInput", "name": "App\\lib\\grid\\GridForm::hideInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_hideInputs", "name": "App\\lib\\grid\\GridForm::hideInputs", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_toggleInput", "name": "App\\lib\\grid\\GridForm::toggleInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_toggleInputs", "name": "App\\lib\\grid\\GridForm::toggleInputs", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_unsetValue", "name": "App\\lib\\grid\\GridForm::unsetValue", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_unsetValues", "name": "App\\lib\\grid\\GridForm::unsetValues", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_resetForm", "name": "App\\lib\\grid\\GridForm::resetForm", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInput", "name": "App\\lib\\grid\\GridForm::setInput", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setTextarea", "name": "App\\lib\\grid\\GridForm::setTextarea", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setRadio", "name": "App\\lib\\grid\\GridForm::setRadio", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setCheckbox", "name": "App\\lib\\grid\\GridForm::setCheckbox", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setSelect", "name": "App\\lib\\grid\\GridForm::setSelect", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setDate", "name": "App\\lib\\grid\\GridForm::setDate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setTime", "name": "App\\lib\\grid\\GridForm::setTime", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setDateTime", "name": "App\\lib\\grid\\GridForm::setDateTime", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputAttribute", "name": "App\\lib\\grid\\GridForm::setInputAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setInputAttributes", "name": "App\\lib\\grid\\GridForm::setInputAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_getInputAttributes", "name": "App\\lib\\grid\\GridForm::getInputAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_loadAttributes", "name": "App\\lib\\grid\\GridForm::loadAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridForm", "fromLink": "App/lib/grid/GridForm.html", "link": "App/lib/grid/GridForm.html#method_setSortOrder", "name": "App\\lib\\grid\\GridForm::setSortOrder", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/GridTable.html", "name": "App\\lib\\grid\\GridTable", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method___construct", "name": "App\\lib\\grid\\GridTable::__construct", "doc": "&quot;GridTable constructor.&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setTable", "name": "App\\lib\\grid\\GridTable::setTable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_loadColumn", "name": "App\\lib\\grid\\GridTable::loadColumn", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_loadColumns", "name": "App\\lib\\grid\\GridTable::loadColumns", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_replaceColumns", "name": "App\\lib\\grid\\GridTable::replaceColumns", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_unsetColumn", "name": "App\\lib\\grid\\GridTable::unsetColumn", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_unsetColumns", "name": "App\\lib\\grid\\GridTable::unsetColumns", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setCell", "name": "App\\lib\\grid\\GridTable::setCell", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_checkCell", "name": "App\\lib\\grid\\GridTable::checkCell", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getCell", "name": "App\\lib\\grid\\GridTable::getCell", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getColumnKeys", "name": "App\\lib\\grid\\GridTable::getColumnKeys", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setCellAttributes", "name": "App\\lib\\grid\\GridTable::setCellAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getCellAttributes", "name": "App\\lib\\grid\\GridTable::getCellAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setCellRowAttributes", "name": "App\\lib\\grid\\GridTable::setCellRowAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getCellRowAttributes", "name": "App\\lib\\grid\\GridTable::getCellRowAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setColumnAttributes", "name": "App\\lib\\grid\\GridTable::setColumnAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getColumnAttributes", "name": "App\\lib\\grid\\GridTable::getColumnAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setColumnRowTemplate", "name": "App\\lib\\grid\\GridTable::setColumnRowTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getColumnRowTemplate", "name": "App\\lib\\grid\\GridTable::getColumnRowTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setCellTemplate", "name": "App\\lib\\grid\\GridTable::setCellTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getCellTemplate", "name": "App\\lib\\grid\\GridTable::getCellTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_setCellRowTemplate", "name": "App\\lib\\grid\\GridTable::setCellRowTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridTable", "fromLink": "App/lib/grid/GridTable.html", "link": "App/lib/grid/GridTable.html#method_getCellRowTemplate", "name": "App\\lib\\grid\\GridTable::getCellRowTemplate", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/GridView.html", "name": "App\\lib\\grid\\GridView", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\GridView", "fromLink": "App/lib/grid/GridView.html", "link": "App/lib/grid/GridView.html#method_fetch", "name": "App\\lib\\grid\\GridView::fetch", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\GridView", "fromLink": "App/lib/grid/GridView.html", "link": "App/lib/grid/GridView.html#method_fetchData", "name": "App\\lib\\grid\\GridView::fetchData", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGrid.html", "name": "App\\lib\\grid\\IGrid", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGrid", "fromLink": "App/lib/grid/IGrid.html", "link": "App/lib/grid/IGrid.html#method_setRenderPath", "name": "App\\lib\\grid\\IGrid::setRenderPath", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGrid", "fromLink": "App/lib/grid/IGrid.html", "link": "App/lib/grid/IGrid.html#method_render", "name": "App\\lib\\grid\\IGrid::render", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridData.html", "name": "App\\lib\\grid\\IGridData", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridData", "fromLink": "App/lib/grid/IGridData.html", "link": "App/lib/grid/IGridData.html#method_fetchFields", "name": "App\\lib\\grid\\IGridData::fetchFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridData", "fromLink": "App/lib/grid/IGridData.html", "link": "App/lib/grid/IGridData.html#method_fetchItems", "name": "App\\lib\\grid\\IGridData::fetchItems", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridData", "fromLink": "App/lib/grid/IGridData.html", "link": "App/lib/grid/IGridData.html#method_fetchCount", "name": "App\\lib\\grid\\IGridData::fetchCount", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridFormProvider.html", "name": "App\\lib\\grid\\IGridFormProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputTypes", "name": "App\\lib\\grid\\IGridFormProvider::gridInputTypes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputSizes", "name": "App\\lib\\grid\\IGridFormProvider::gridInputSizes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputOptions", "name": "App\\lib\\grid\\IGridFormProvider::gridInputOptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputPrompts", "name": "App\\lib\\grid\\IGridFormProvider::gridInputPrompts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridFormProvider", "fromLink": "App/lib/grid/IGridFormProvider.html", "link": "App/lib/grid/IGridFormProvider.html#method_gridInputErrors", "name": "App\\lib\\grid\\IGridFormProvider::gridInputErrors", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridProvider.html", "name": "App\\lib\\grid\\IGridProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridProvider", "fromLink": "App/lib/grid/IGridProvider.html", "link": "App/lib/grid/IGridProvider.html#method_gridFields", "name": "App\\lib\\grid\\IGridProvider::gridFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\IGridProvider", "fromLink": "App/lib/grid/IGridProvider.html", "link": "App/lib/grid/IGridProvider.html#method_gridSafeFields", "name": "App\\lib\\grid\\IGridProvider::gridSafeFields", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid", "fromLink": "App/lib/grid.html", "link": "App/lib/grid/IGridTableProvider.html", "name": "App\\lib\\grid\\IGridTableProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\IGridTableProvider", "fromLink": "App/lib/grid/IGridTableProvider.html", "link": "App/lib/grid/IGridTableProvider.html#method_gridTableCellPrompts", "name": "App\\lib\\grid\\IGridTableProvider::gridTableCellPrompts", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\lib\\grid\\plugins\\pagination", "fromLink": "App/lib/grid/plugins/pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method___construct", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::__construct", "doc": "&quot;Create instance.&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_setPageName", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::setPageName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_getPages", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::getPages", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_getOffset", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::getOffset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_getLimit", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::getLimit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_setUrl", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::setUrl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_getUrl", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::getUrl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_setQueryString", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::setQueryString", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_getQueryString", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::getQueryString", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_build", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::build", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_fetchPages", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::fetchPages", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_showDirectControls", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::showDirectControls", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_showMarginControls", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::showMarginControls", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_setControls", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::setControls", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\lib\\grid\\plugins\\pagination\\Pagination", "fromLink": "App/lib/grid/plugins/pagination/Pagination.html", "link": "App/lib/grid/plugins/pagination/Pagination.html#method_render", "name": "App\\lib\\grid\\plugins\\pagination\\Pagination::render", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "App\\traits", "fromLink": "App/traits.html", "link": "App/traits/TGrid.html", "name": "App\\traits\\TGrid", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridInputErrors", "name": "App\\traits\\TGrid::gridInputErrors", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridInputSizes", "name": "App\\traits\\TGrid::gridInputSizes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridTableCellPrompts", "name": "App\\traits\\TGrid::gridTableCellPrompts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridInputPrompts", "name": "App\\traits\\TGrid::gridInputPrompts", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridInputTypes", "name": "App\\traits\\TGrid::gridInputTypes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridInputOptions", "name": "App\\traits\\TGrid::gridInputOptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridSafeFields", "name": "App\\traits\\TGrid::gridSafeFields", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TGrid", "fromLink": "App/traits/TGrid.html", "link": "App/traits/TGrid.html#method_gridFields", "name": "App\\traits\\TGrid::gridFields", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "App\\traits", "fromLink": "App/traits.html", "link": "App/traits/TModel.html", "name": "App\\traits\\TModel", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\traits\\TModel", "fromLink": "App/traits/TModel.html", "link": "App/traits/TModel.html#method_loadData", "name": "App\\traits\\TModel::loadData", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\traits\\TModel", "fromLink": "App/traits/TModel.html", "link": "App/traits/TModel.html#method_setErrors", "name": "App\\traits\\TModel::setErrors", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


