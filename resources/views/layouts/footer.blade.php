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
                   <li><a href="{{route('contribute')}}#donate">Donate</a></li>
                   <li><a href="{{route('contribute')}}#content">Content</a></li>
                   <li><a href="{{route('contribute')}}#images">Images</a></li>
               </ul>
           </div>
           <div class="col-md-3">
               <h4>Contact</h4>
               <p>You can get in touch with us by mailing the following email</p>
               <p><a href="mailto:{{config('constants.mail')}}">{{config('constants.mail')}}</a></p>
           </div>
           <div class="col-md-3">
            <h4>Links</h4>
               <ul class="list-unstyled">
                   <li><a href="http://www.deltiasgaming.com" target="_blank">Delitasgaming</a></li>
               </ul>
           </div>

       </div>
    </div>
</footer>