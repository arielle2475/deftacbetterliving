<div class="modal fade" id="extendModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header" style="color: rgb(255,255,255);background-color: rgba(0,0,0);">
        <h5 class="modal-title" style="font-weight:bold;" id="extendTitle"></h5>
        <button type="button" style="color:white;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center d-flex d-lg-flex justify-content-center justify-content-lg-center align-items-lg-center" style="background-color: #cfcfcf;">

        <section class="border rounded shadow-lg" style="height: 300px;padding-top: 0px;background-color: #ffffff;margin-left: 0;margin-right: 0;font-family: Montserrat, sans-serif;padding-bottom: 0px;max-width: 250px;width: 250px;">
            <p class="bg-warning" style="margin-top: 0px;font-weight: bold;margin-bottom: 0px;margin-right: 0px;background-color: #fdd400;padding-top: 10px;padding-bottom: 10px;color: rgb(0,0,0);">
            <span id='userID'></span>
            </p>
            <img class="rounded-circle" id='userImage' src='' width="100px" height="100px" style="margin-top: 10px;margin-bottom: 11px;">
            <hr class="d-lg-flex flex-grow-1 flex-shrink-1 justify-content-lg-center"style="background-color: #000000;height: 1px;padding-right: 0px;min-width: 44px;max-width: 171px;margin-top: 0px;">
                <p style="margin-top: 17px;font-weight: bold;margin-bottom: 0px;color:black;">
                <span id='userName'></span>
                </p>
                <p style="margin-top: 17px;font-weight: bold;margin-bottom: 1px;font-size: 12px; color:black;">
                <span id='userEmail'></span>
                </p>
        </section>
            </div>
            <div class="modal-footer" style="background-color: rgba(0,0,0);">
                <div class="row">
                        <form action="" method="POST" id='extendForm'>
                            <input type="submit" class="btn" id="extendButton" value='' style="font-weight:bold; margin-right:10px; height:40px; background-color: rgb(255,214,0);color: rgb(255,255,255); margin-right:10px; ">
                        </form> 
                    <button class="btn bg-warning" type="button" data-dismiss="modal" style="font-family: Montserrat, sans-serif;font-weight: bold; height:40px; background-color: rgb(255,214,0);color: rgb(255,255,255); margin-right:10px;">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>