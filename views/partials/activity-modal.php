<div class="modal fade" id="activity-modal" tabindex="-1" aria-labelledby="activity-modal-label" aria-hidden="true" data-current-letter-index="">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="activity-modal-label">Activity details</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="consent" class="px-3">
          <p>We would like to display a Strava activity here by embedding it. Are you ok with <a href="https://www.strava.com/legal/cookie_policy" target="_blank">Stravas cookie policy</a>? Your answer will be stored for the duration of your visit to this page.</p>
          <p>
            <button class="btn btn-dark" id="consent-given-trigger">Yes</button>
          </p>
          <p>
            If you don't want us to show the activity here, you can <a href="#" data-href-template="https://www.strava.com/activities/#ACTIVITYID-1#"  target="_blank" id="consent-activity-link">view the activity at Strava in a new window</a>.
          </p>
        </div>
        <div id="activity-modal__embed-wrapper" class="d-none">
          <div class="ratio" style="--bs-aspect-ratio: 70%;">
            <iframe allowtransparency="true" data-src-template="https://www.strava.com/activities/#ACTIVITYID-1#/embed/#ACTIVITYID-2#" id="activity-details-iframe" data-activity-id-1="" data-activity-id-2=""></iframe>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center" id="activity-navigation-wrapper">
        <button class="btn activity-navigation" data-direction="-1" title="Previous activity">&laquo; <span class="visually-hidden">Previous</span></button>
        <button class="btn activity-navigation" data-direction="+1" title="Next activity">&raquo; <span class="visually-hidden">Next</span></button>
      </div>
    </div>
  </div>
</div>
