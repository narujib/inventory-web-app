@extends('layouts.main-layout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

<div class="row">
  <!-- User Sidebar -->
  <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">

            <img class="img-fluid rounded my-4" src="{{ asset('sneat-bootstrap-free/img/avatars/7.png') }}" height="200" width="200" alt="User avatar">
            <div class="user-info text-center">
              <h4 class="mb-2" _msttexthash="228995" _msthash="273">Violet Mendoza</h4>
              <span class="badge bg-label-secondary" _msttexthash="78832" _msthash="274">Author</span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-around flex-wrap my-4 py-3">
          <div class="d-flex align-items-start me-4 mt-3 gap-3">
            <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-check bx-sm"></i></span>
            <div>
              <h5 class="mb-0" _msttexthash="37024" _msthash="275">1.23k</h5>
              <span _msttexthash="130624" _msthash="276">Tasks Done</span>
            </div>
          </div>
          <div class="d-flex align-items-start mt-3 gap-3">
            <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-customize bx-sm"></i></span>
            <div>
              <h5 class="mb-0" _msttexthash="16991" _msthash="277">568</h5>
              <span _msttexthash="200616" _msthash="278">Projects Done</span>
            </div>
          </div>
        </div>
        <h5 class="pb-2 border-bottom mb-4" _msttexthash="94172" _msthash="279">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="396552" _msthash="280"><span class="fw-medium me-2" _mstmutation="1">Username:</span>
              <span _mstmutation="1">violet.dev</span></font>
            </li>
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="633035" _msthash="281"><span class="fw-medium me-2" _mstmutation="1">Email:</span>
              <span _mstmutation="1">vafgot@vultukir.org</span></font>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2" _msttexthash="90519" _msthash="282">Status:</span>
              <span class="badge bg-label-success" _msttexthash="76063" _msthash="283">Active</span>
            </li>
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="172653" _msthash="284"><span class="fw-medium me-2" _mstmutation="1">Role:</span>
              <span _mstmutation="1">Author</span></font>
            </li>
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="186212" _msthash="285"><span class="fw-medium me-2" _mstmutation="1">Tax id:</span>
              <span _mstmutation="1">Tax-8965</span></font>
            </li>
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="284531" _msthash="286"><span class="fw-medium me-2" _mstmutation="1">Contact:</span>
              <span _mstmutation="1">(123) 456-7890</span></font>
            </li>
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="297869" _msthash="287"><span class="fw-medium me-2" _mstmutation="1">Languages:</span>
              <span _mstmutation="1">French</span></font>
            </li>
            <li class="mb-3">
              <font _mstmutation="1" _msttexthash="275236" _msthash="288"><span class="fw-medium me-2" _mstmutation="1">Country:</span>
              <span _mstmutation="1">England</span></font>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /User Card -->
  </div>
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    <!-- User Pills -->
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i><font _mstmutation="1" _msttexthash="95719" _msthash="301">Account</font></a></li>
      <li class="nav-item"><a class="nav-link" href="app-user-view-security.html"><i class="bx bx-lock-alt me-1"></i><font _mstmutation="1" _msttexthash="119158" _msthash="302">Security</font></a></li>
      <li class="nav-item"><a class="nav-link" href="app-user-view-billing.html"><i class="bx bx-detail me-1"></i><font _mstmutation="1" _msttexthash="213746" _msthash="303">Billing &amp; Plans</font></a></li>
      <li class="nav-item"><a class="nav-link" href="app-user-view-notifications.html"><i class="bx bx-bell me-1"></i><font _mstmutation="1" _msttexthash="234351" _msthash="304">Notifications</font></a></li>
      <li class="nav-item"><a class="nav-link" href="app-user-view-connections.html"><i class="bx bx-link-alt me-1"></i><font _mstmutation="1" _msttexthash="183352" _msthash="305">Connections</font></a></li>
    </ul>
    <!--/ User Pills -->

    <!-- Project table -->
    <div class="card mb-4">
      <h5 class="card-header" _msttexthash="373204" _msthash="306">User's Projects List</h5>
      <div class="table-responsive mb-3">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="d-flex justify-content-between align-items-center flex-column flex-sm-row mx-4 row"><div class="col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center"><div class="dataTables_length" id="DataTables_Table_0_length"><label><font _mstmutation="1" _msttexthash="46826" _msthash="307">Show </font><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="7" _msttexthash="5005" _msthash="308">7</option><option value="10" _msttexthash="9451" _msthash="309">10</option><option value="25" _msttexthash="10062" _msthash="310">25</option><option value="50" _msttexthash="9815" _msthash="311">50</option><option value="75" _msttexthash="10517" _msthash="312">75</option><option value="100" _msttexthash="15067" _msthash="313">100</option></select></label></div></div><div class="col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><font _mstmutation="1" _msttexthash="84409" _msthash="315">Search:</font><input type="search" class="form-control" placeholder="Search Project" aria-controls="DataTables_Table_0" _mstplaceholder="226707" _msthash="314"></label></div></div></div><table class="table datatable-project border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 799px;">
          <thead>
            <tr><th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px;" aria-label=""></th><th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 273px;" aria-label="Project: activate to sort column ascending" aria-sort="descending" _mstaria-label="1282060" _msthash="316" _msttexthash="95394">Project</th><th class="text-nowrap sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 113px; display: none;" aria-label="Total Task" _mstaria-label="132106" _msthash="317" _msttexthash="132106" _mstvisible="0">Total Task</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 104px;" aria-label="Progress: activate to sort column ascending" _mstaria-label="1345994" _msthash="318" _msttexthash="117936">Progress</th><th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 79px; display: none;" aria-label="Hours" _msthidden="1" _mstaria-label="63050" _msthash="319" _msttexthash="63050">Hours</th></tr>
          </thead><tbody><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/vue-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="320"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="315705" _msthash="321">Vue Admin template</span><small class="text-muted" _msttexthash="204685" _msthash="322">Vuejs Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="46657" _msthash="323" _mstvisible="0">214/627</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="15158" _msthash="324">78%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-success" style="width: 78%" aria-valuenow="78%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="48451" _msthidden="1" _msthash="325">88:19h</td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/event-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="326"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="225602" _msthash="327">Online Webinar</span><small class="text-muted" _msttexthash="224679" _msthash="328">Official Event</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="28522" _msthash="329" _mstvisible="0">12/20</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="15171" _msthash="330">69%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-info" style="width: 69%" aria-valuenow="69%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="46189" _msthidden="1" _msthash="331">12:12h</td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/html-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="332"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="253409" _msthash="333">Hoffman Website</span><small class="text-muted" _msttexthash="167375" _msthash="334">HTML Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="38272" _msthash="335" _mstvisible="0">56/183</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14365" _msthash="336">43%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="22789" _msthidden="1" _msthash="337">76h</td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/sketch-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="338"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="349622" _msthash="339">Foodista mobile app</span><small class="text-muted" _msttexthash="228059" _msthash="340">iPhone Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="30160" _msthash="341" _mstvisible="0">12/86</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14989" _msthash="342">49%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-warning" style="width: 49%" aria-valuenow="49%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="22412" _msthidden="1" _msthash="343">45h</td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/xd-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="344"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="305162" _msthash="345">Falcon Logo Design</span><small class="text-muted" _msttexthash="187109" _msthash="346">UI/UX Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="22516" _msthash="347" _mstvisible="0">9/50</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14300" _msthash="348">15%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-danger" style="width: 15%" aria-valuenow="15%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="23192" _msthidden="1" _msthash="349">89h</td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/react-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="350"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="309530" _msthash="351">Dojo React Project</span><small class="text-muted" _msttexthash="201422" _msthash="352">React Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="47385" _msthash="353" _mstvisible="0">234/378</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14638" _msthash="354">73%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-info" style="width: 73%" aria-valuenow="73%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="46878" _msthidden="1" _msthash="355">67:10h</td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/vue-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="356"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="277342" _msthash="357">Dashboard Design</span><small class="text-muted" _msttexthash="204685" _msthash="358">Vuejs Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="45188" _msthash="359" _mstvisible="0">100/190</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14508" _msthash="360">90%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-success" style="width: 90%" aria-valuenow="90%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="57148" _msthidden="1" _msthash="361">129:45h</td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/html-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="362"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="231985" _msthash="363">Crypto Website</span><small class="text-muted" _msttexthash="167375" _msthash="364">HTML Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="47190" _msthash="365" _mstvisible="0">264/537</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14521" _msthash="366">81%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-success" style="width: 81%" aria-valuenow="81%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="57304" _msthidden="1" _msthash="367">108:39h</td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/figma-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="368"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="341432" _msthash="369">Blockchain Website</span><small class="text-muted" _msttexthash="232089" _msthash="370">Python Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="45903" _msthash="371" _mstvisible="0">104/137</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="15028" _msthash="372">95%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-success" style="width: 95%" aria-valuenow="95%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="57616" _msthidden="1" _msthash="373">138:39h</td></tr><tr class="even"><td class="control" style="" tabindex="0"></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/react-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="374"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="264186" _msthash="375">BGC eCommerce App</span><small class="text-muted" _msttexthash="201422" _msthash="376">React Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="44993" _msthash="377" _mstvisible="0">122/240</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14235" _msthash="378">60%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="55159" _msthidden="1" _msthash="379">210:30h</td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="dt-checkboxes-cell" style=""><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1" style=""><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/icons/brands/xd-label.png" alt="Project Image" class="rounded-circle" _mstalt="196508" _msthash="380"></div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium" _msttexthash="449540" _msthash="381">Admin template Project</span><small class="text-muted" _msttexthash="187109" _msthash="382">UI/UX Project</small></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="46527" _msthash="383" _mstvisible="0">148/280</td><td class="" style=""><div class="d-flex flex-column"><small class="mb-1" _msttexthash="14456" _msthash="384">53%</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar bg-info" style="width: 53%" aria-valuenow="53%" aria-valuemin="0" aria-valuemax="100"></div></div></div></td><td class="dtr-hidden" style="display: none;" _msttexthash="46566" _msthidden="1" _msthash="385">26:02h</td></tr></tbody>
        </table><div class="d-flex justify-content-between mx-4 row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" _msttexthash="512382" _msthash="386">Showing 1 to 11 of 11 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link" _msttexthash="119327" _msthash="387">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link" _msttexthash="4459" _msthash="388">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link" _msttexthash="46722" _msthash="389">Next</a></li></ul></div></div></div><div style="width: 1%;"></div></div>
      </div>
    </div>
    <!-- /Project table -->



  </div>
  <!--/ User Content -->
</div>

@endsection