<footer>
    <div class="container">
       <div class="row">
           <div class="col-md-3">
                <h4>About</h4>
                <ul class="list-unstyled">
                    <li><a href="{{route('about')}}#about-tesodelve">TesoDelve.com</a></li>
                    <li><a href="{{route('about')}}#about-me">About me</a></li>
                </ul>
           </div>
           <div class="col-md-3">
               <h4>Contribute</h4>
               <ul class="list-unstyled">
                   <li><a href="{{config('constants.patreon')}}">Patreon</a></li>
                   <li><a href="{{route('contribute')}}#donate">Donate</a></li>
                   <li><a href="{{route('contribute')}}#content">Content</a></li>
                   <li><a href="{{route('contribute')}}#images">Images</a></li>
               </ul>
           </div>
           <div class="col-md-3">
               <h4>Contact</h4>
               <p>You can contact us by using the links below:</p>
               <ul class="list-unstyled">
                   <li><a href="mailto:{{config('constants.mail')}}">{{config('constants.mail')}}</a></li>
                   <li><a href="{{config('constants.discord')}}" title="Discord">Discord</a></li>
               </ul>
           </div>
           <div class="col-md-3">
            <h4>Links</h4>
               <ul class="list-unstyled">
                   <li><a href="http://www.eso-database.com" target="_blank">Eso-Database</a></li>
                   <li><a href="http://www.eso-leaderboards.com" target="_blank">Eso-Leaderboards</a></li>
                   <li><a href="http://www.deltiasgaming.com" target="_blank">Deltiasgaming</a></li>
                   <li><a href="http://www.alcasthq.com" target="_blank">AlcastHQ</a></li>
               </ul>
           </div>

       </div>
    </div>
</footer>