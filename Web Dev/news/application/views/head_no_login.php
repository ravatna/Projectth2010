<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">ข่าวสารในสถานศึกษา</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li ><?=anchor('news/news_no_login/','หน้าแรก');?></li>
                <li><?=anchor('news/news_no_login/?filter=ข่าวภายใน','ข่าวภายใน');?></li>
				<li><?=anchor('news/news_no_login/?filter=ข่าวภายนอก','ข่าวภายนอก');?></li>
				<li><?=anchor('news/news_no_login/?filter=หนังสือราชการ','หนังสือราชการ');?></li>
				<li><?=anchor('#','ถ่ายทอดสด');?></li>
				<li><?=anchor('#','วีดีโอย้อนหลัง');?></li>
				<li><?=anchor('member/','admin');?></li>
              </ul> <!-- end list menu -->
            </div> <!-- end  menu bar -->
          </div>
        </nav>

      </div>
    </div>