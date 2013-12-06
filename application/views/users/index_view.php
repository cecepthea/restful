<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-6" ui-view="thelist">
            <ul class="list-unstyled">
                <li ng-repeat="user in users">
                  <a ui-sref="contacts.detail({userID:user.id})">{{user.name}}</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-6" ui-view="thedetails">

        </div>
    </div>
</div>
