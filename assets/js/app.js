document.onreadystatechange = function () {
  if (document.readyState == "interactive") {

    let mCHNY_activityModal = document.getElementById('activity-modal');
    let mCHNY_consentActivityLink = document.getElementById('consent-activity-link');
    let mCHNY_activityDetailsIframe = document.getElementById('activity-details-iframe');
    let mCHNY_consentGivenTrigger = document.getElementById('consent-given-trigger');
    let mCHNY_activityEmbedWrapper = document.getElementById('activity-modal__embed-wrapper');
    let mCHNY_activityNavigationWrapper = document.getElementById('activity-navigation-wrapper');
    let mCHNY_activityButtons = document.getElementsByClassName('activity-btn');
    let mCHNY_okToEmbed = false;

    let mCHNY_activityDetailsSrcTemplate = mCHNY_activityDetailsIframe.getAttribute('data-src-template');
    let mCHNY_consentActivityLinkHrefTemplate = mCHNY_consentActivityLink.getAttribute('data-href-template');

    /**
     *
     */
    mCHNY_activityModal.addEventListener('show.bs.modal', function(event) {

      let activityId1 = event.relatedTarget.getAttribute('data-activity-id-1');
      let activityId2 = event.relatedTarget.getAttribute('data-activity-id-2');
      let letterIndex = event.relatedTarget.getAttribute('data-letter-index');

      mCHNY_activityDetailsIframe.setAttribute('data-activity-id-1', activityId1);
      mCHNY_activityDetailsIframe.setAttribute('data-activity-id-2', activityId2);

      document.querySelector('[data-direction="-1"]').disabled = false;
      document.querySelector('[data-direction="+1"]').disabled = false;

      if(mCHNY_okToEmbed) {
        mCHNY_embedActivity();
      }

      mCHNY_activityModal.setAttribute('data-current-letter-index', letterIndex);

      mCHNY_consentActivityLink.setAttribute('href', mCHNY_consentActivityLinkHrefTemplate.replace('#ACTIVITYID-1#', activityId1));

      if(letterIndex == 0) {
        document.querySelector('[data-direction="-1"]').disabled = true;
      } else if(letterIndex == mCHNY_activityButtons.length - 1) {
        document.querySelector('[data-direction="+1"]').disabled = true;
      }

    });

    /**
     *
     */
    mCHNY_activityModal.addEventListener('hidden.bs.modal', function(event) {

      mCHNY_activityDetailsIframe.setAttribute('src', '');

    });

    /**
     *
     */
    mCHNY_consentGivenTrigger.addEventListener('click', function(event) {

      document.body.classList.add('activity-consent-given');
      mCHNY_embedActivity();
      mCHNY_okToEmbed = true;

    });

    /**
     *
     */
    mCHNY_activityNavigationWrapper.addEventListener('click', function(event) {

      let clickedElm = event.target;
      let direction = clickedElm.getAttribute('data-direction');

      if(
        !direction
        || clickedElm.disabled
      ) {
        return;
      }

      for(let child of clickedElm.parentNode.childNodes) {
        child.disabled = false;
      }

      let currentLetterIndex = parseInt(mCHNY_activityModal.getAttribute('data-current-letter-index'));
      let newLetterIndex;

      if(direction == -1) {
        newLetterIndex = currentLetterIndex - 1;
      } else {
        newLetterIndex = currentLetterIndex + 1;
      }

      mCHNY_activityModal.setAttribute('data-current-letter-index', newLetterIndex);
      let activityDetails = mCHNY_getActivityDetailsForIndex(newLetterIndex);

      if(activityDetails !== false) {

        mCHNY_activityDetailsIframe.setAttribute('data-activity-id-1', activityDetails[0]);
        mCHNY_activityDetailsIframe.setAttribute('data-activity-id-2', activityDetails[1]);

        if(mCHNY_okToEmbed) {
          mCHNY_embedActivity();
        }

      }

      if(
        (direction == -1 && mCHNY_getActivityDetailsForIndex(newLetterIndex - 1) === false)
        || (direction == +1 && mCHNY_getActivityDetailsForIndex(newLetterIndex + 1) === false)
      ) {

        clickedElm.disabled = true;

      }

    });

    /**
     *
     */
    function mCHNY_embedActivity() {

      let activityId1 = mCHNY_activityDetailsIframe.getAttribute('data-activity-id-1');
      let activityId2 = mCHNY_activityDetailsIframe.getAttribute('data-activity-id-2');
      mCHNY_activityEmbedWrapper.classList.remove('d-none');
      mCHNY_activityEmbedWrapper.classList.add('d-block');

      let src = mCHNY_activityDetailsSrcTemplate.replace('#ACTIVITYID-1#', activityId1);
      src = src.replace('#ACTIVITYID-2#', activityId2);
      mCHNY_activityDetailsIframe.setAttribute('src', src);

    }

    /**
     *
     * @param index
     * @returns {boolean}
     */
    function mCHNY_getActivityDetailsForIndex(desiredIndex) {

      let returnVal = false;

      for(let mCHNY_activityButton of mCHNY_activityButtons) {

        if(mCHNY_activityButton.getAttribute('data-letter-index') == desiredIndex) {

          returnVal = [mCHNY_activityButton.getAttribute('data-activity-id-1'), mCHNY_activityButton.getAttribute('data-activity-id-2')];

        }

      }

      return returnVal;

    }

  }
}
