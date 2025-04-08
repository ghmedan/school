 <div class="scrollbar side-menu-bg" style="overflow: scroll">
     <ul class="nav navbar-nav side-menu" id="sidebarnav">
         <!-- menu item Dashboard-->
         <li>
             <a href="{{ url('/dashboard') }}">
                 <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{ trans('main_trans.Dashboard') }}</span>
                 </div>
                 <div class="clearfix"></div>
             </a>
         </li>
         <!-- menu title -->


         <!-- Grades-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                 <div class="pull-left"><i class="fas fa-school"></i><span
                         class="right-nav-text">{{ trans('main_trans.Grade_school') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                 <li><a href="{{ url('/grades_index') }}">{{ trans('main_trans.Grades_list') }}</a></li>

             </ul>
         </li>
         <!-- classes-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                 <div class="pull-left"><i class="fa fa-building"></i><span
                         class="right-nav-text">{{ trans('classroom.List_Class') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                 <li><a href="{{ url('class_index') }}">{{ trans('main_trans.List_classes') }}</a></li>
             </ul>
         </li>


         <!-- sections-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                 <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                         class="right-nav-text">{{ trans('main_trans.sections') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                 <li><a href="{{ url('section_index') }}">{{ trans('main_trans.List_sections') }}</a></li>
             </ul>
         </li>


         <!-- students-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                 <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                         class="right-nav-text">{{ trans('main_trans.students') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('/student_index') }}">Events Calendar </a> </li>
                 <li> <a href="{{ url('/student_promot') }}">student_promot</a> </li>
                 <li> <a href="{{ url('/student_mangmint') }}">student_mangmint </a> </li>
                 <li> <a href="{{ url('/Graduated_creat') }}">Graduated_index </a> </li>

             </ul>
         </li>

         <!-- Subjects-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                 <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">المواد
                         الدراسية</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ route('subjects_index') }}">قائمة المواد</a> </li>
             </ul>
         </li>




         <!-- Teachers-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                 <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                         class="right-nav-text">{{ trans('main_trans.Teachers') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('Teachers') }}">List Calendar</a> </li>
             </ul>
         </li>


         <!-- Parents-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                 <div class="pull-left"><i class="fas fa-user-tie"></i><span
                         class="right-nav-text">{{ trans('main_trans.Parents') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('add_parent') }}">{{ trans('main_trans.List_Parents') }}</a> </li>
             </ul>
         </li>

         <!-- Accounts-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                 <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                         class="right-nav-text">{{ trans('main_trans.Accounts') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('fees_index') }}">Events Calendar </a> </li>
                 <li> <a href="{{ route('fees_Invoices_index') }}">الفواتير</a> </li>
                 <li> <a href="{{ route('receipt_students_index') }}">سندات القبض</a> </li>
                 <li> <a href="{{ route('ProcessingFee_index') }}">استبعاد رسوم </a> </li>
                 <li> <a href="{{ route('Payment_students_index') }}"> سندات الصرف </a> </li>



             </ul>
         </li>

         <!-- Attendance-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                 <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                         class="right-nav-text">{{ trans('main_trans.Attendance') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ route('Attendance_index') }}">حظور وغياب </a> </li>
                 <li> <a href="themify-icons.html">Themify icons</a> </li>
                 <li> <a href="weather-icon.html">Weather icons</a> </li>
             </ul>
         </li>

         <!-- Quizzes-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                 <div class="pull-left"><i class="fas fa-book-open"></i><span
                         class="right-nav-text">الاختبارات</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('Quizzes_index') }}">قائمة الاختبارات</a> </li>
                 <li> <a href="{{ url('questions_index') }}">قائمة الاسئلة</a> </li>
             </ul>
         </li>




         <!-- library-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                 <div class="pull-left"><i class="fas fa-book"></i><span
                         class="right-nav-text">{{ trans('main_trans.library') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('library_index') }}">المكتبة</a> </li>
                 <li> <a href="themify-icons.html">Themify icons</a> </li>
                 <li> <a href="weather-icon.html">Weather icons</a> </li>
             </ul>
         </li>


         <!-- Onlinec lasses-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                 <div class="pull-left"><i class="fas fa-video"></i><span
                         class="right-nav-text">{{ trans('main_trans.Onlineclasses') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('onlineclass_index') }}">zoom </a> </li>
                 <li> <a href="themify-icons.html">Themify icons</a> </li>
                 <li> <a href="weather-icon.html">Weather icons</a> </li>
             </ul>
         </li>


         <!-- Settings-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                 <div class="pull-left"><i class="fas fa-cogs"></i><span
                         class="right-nav-text">{{ trans('main_trans.Settings') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="{{ url('setting') }}">setting</a> </li>
                 <li> <a href="themify-icons.html">Themify icons</a> </li>
                 <li> <a href="weather-icon.html">Weather icons</a> </li>
             </ul>
         </li>


         <!-- Users-->
         <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                 <div class="pull-left"><i class="fas fa-users"></i><span
                         class="right-nav-text">{{ trans('main_trans.Users') }}</span></div>
                 <div class="pull-right"><i class="ti-plus"></i></div>
                 <div class="clearfix"></div>
             </a>
             <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                 <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                 <li> <a href="themify-icons.html">Themify icons</a> </li>
                 <li> <a href="weather-icon.html">Weather icons</a> </li>
             </ul>
         </li>

     </ul>
 </div>
