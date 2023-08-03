<div class="modal fade" id="judgement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
        @if ($num_A == 0 && $num_B == 0)
        <div class="container mt-5">
          <h1 class="mt-3 text-center fw-bold mb-5 text-warning">No Contest</h1>
        </div>
        @else
          @if ($num_A == $num_B)
          <div class="container mt-5">
            <h1 class="mt-3 text-center fw-bold mb-3 text-warning">It's a Tie!</h1>
            <div class="row mb-5">
              <div class="col">
                <img src="{{ asset('/storage/images/TspVoteSystem_sideA.jpg') }}" alt="TspVoteSystem_sideA" class="img-fluid w-100 rounded">
              </div>
              <div class="col">
                <img src="{{ asset('storage/images/TspVoteSystem_sideB.jpg') }}" alt="TspVoteSystem_sideB" class="img-fluid w-100 rounded">
              </div>
            </div>
          </div>
          @else
              @if ($num_A > $num_B)
                <div class="container mt-5">
                  <h1 class="mt-3 text-center fw-bold mb-3 text-warning">The Winner is ...</h1>
                  <div class="row">
                    <div class="col">
                      <img src="{{ asset('/storage/images/TspVoteSystem_sideA.jpg') }}" alt="TspVoteSystem_sideA" class="img-fluid w-100 rounded mb-5">
                    </div>
                  </div>
                </div>
              @else
                <div class="container mt-5">
                  <h1 class="mt-3 text-center fw-bold mb-3 text-warning">The Winner is ...</h1>
                  <div class="row">
                    <div class="col">
                      <img src="{{ asset('storage/images/TspVoteSystem_sideB.jpg') }}" alt="TspVoteSystem_sideB" class="img-fluid w-100 rounded mb-5">
                    </div>
                  </div>
                </div>
              @endif
          @endif
        @endif
      </div>
    </div>
  </div>
</div>