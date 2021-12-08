document.onreadystatechange = function () {
  if (document.readyState == "interactive") {

    let mCHN_activityModal = document.getElementById('activity-modal');
    let mCHN_consentActivityLink = document.getElementById('consent-activity-link');
    let mCHN_activityDetailsIframe = document.getElementById('activity-details-iframe');
    let mCHN_consentGivenTrigger = document.getElementById('consent-given-trigger');
    let mCHN_activityEmbedWrapper = document.getElementById('activity-modal__embed-wrapper');
    let mCHN_okToEmbed = false;

    let mCHN_activityDetailsSrcTemplate = mCHN_activityDetailsIframe.getAttribute('data-src-template');
    let mCHN_consentActivityLinkHrefTemplate = mCHN_consentActivityLink.getAttribute('data-href-template');

    /**
     *
     */
    mCHN_activityModal.addEventListener('show.bs.modal', function(event) {

      let activityId1 = event.relatedTarget.getAttribute('data-activity-id-1');
      let activityId2 = event.relatedTarget.getAttribute('data-activity-id-2');

      mCHN_activityDetailsIframe.setAttribute('data-activity-id-1', activityId1);
      mCHN_activityDetailsIframe.setAttribute('data-activity-id-2', activityId2);

      if(mCHN_okToEmbed) {
        mCHN_embedActivity();
      }

      mCHN_consentActivityLink.setAttribute('href', mCHN_consentActivityLinkHrefTemplate.replace('#ACTIVITYID-1#', activityId1));

    });

    /**
     *
     */
    mCHN_activityModal.addEventListener('hidden.bs.modal', function(event) {

      mCHN_activityDetailsIframe.setAttribute('src', '');

    });

    /**
     *
     */
    mCHN_consentGivenTrigger.addEventListener('click', function(event) {
      document.getElementById('consent').classList.add('d-none');
      mCHN_embedActivity();
      mCHN_okToEmbed = true;
    });

    /**
     *
     */
    function mCHN_embedActivity() {

      let activityId1 = mCHN_activityDetailsIframe.getAttribute('data-activity-id-1');
      let activityId2 = mCHN_activityDetailsIframe.getAttribute('data-activity-id-2');
      mCHN_activityEmbedWrapper.classList.remove('d-none');
      mCHN_activityEmbedWrapper.classList.add('d-block');

      let src = mCHN_activityDetailsSrcTemplate.replace('#ACTIVITYID-1#', activityId1);
      src = src.replace('#ACTIVITYID-2#', activityId2);
      mCHN_activityDetailsIframe.setAttribute('src', src);

    }

  }
}
