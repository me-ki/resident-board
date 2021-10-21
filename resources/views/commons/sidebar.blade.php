@if(Auth::user()->category == '10')
    <div class="col-sm-4">
        <aside class="sidebar">
          <ul>
            <li class="linkbox list-unstyled bg-light">
              <a href="/faqs"><i class="fas fa-user fa-lg mr-2"></i>ご入居中のQ&A</a>
            </li>
            
            <li class="linkbox list-unstyled bg-light mt-3">
              <a href="/shop"><i class="fas fa-store fa-lg mr-2"></i>店舗案内</a>
            </li>
            
            <li class="linkbox list-unstyled bg-light mt-3">
              <a href="users"><i class="fas fa-envelope fa-lg mr-2"></i>お問い合わせ</a>
            </li>
          </ul>
        </aside>
      </div>
@elseif(Auth::user()->category == '5')
    <div class="col-sm-4">
        <aside class="sidebar">
          <ul>
            <li class="linkbox list-unstyled bg-light">
              <a href="/buildings"><i class="fas fa-building fa-lg mr-2"></i>管理物件一覧</a>
            </li>
            
            <li class="linkbox list-unstyled bg-light mt-3">
              <a href="/users"><i class="fas fa-user fa-lg mr-2"></i>会員一覧</a>
            </li>
            
            <li class="linkbox list-unstyled bg-light mt-3">
              <a href="/faqs"><i class="fas fa-user fa-lg mr-2"></i>FAQ一覧</a>
            </li>
          </ul>
        </aside>
    </div>
@endif