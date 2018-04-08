By clicking Register you accept to our 
                                     <a  href="#modal1">Terms & Conditions</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="center-align modal-content">
      <h4>Terms & Conditions</h4>
      @foreach($terms as $term)
      <p class="center-align">{{$term->terms_cond}}</p>
      @endforeach
    </div>
   
  </div>