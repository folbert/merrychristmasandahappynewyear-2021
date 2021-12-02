document.onreadystatechange = function () {
  if (document.readyState == "interactive") {

    const activityDetailsIframe = document.getElementById('activity-details-iframe');
    const activityDetailsSrcTemplate = activityDetailsIframe.getAttribute('data-src-template');

    let activityModal = document.getElementById('activity-modal');

    /**
     *
     */
    activityModal.addEventListener('show.bs.modal', function(event) {

      let activityId1 = event.relatedTarget.getAttribute('data-activity-id-1');
      let activityId2 = event.relatedTarget.getAttribute('data-activity-id-2');
      let src = activityDetailsSrcTemplate.replace('#ACTIVITYID-1#', activityId1);

      src = src.replace('#ACTIVITYID-2#', activityId2);

      activityDetailsIframe.setAttribute('src', src);

    });

    /**
     *
     */
    activityModal.addEventListener('hidden.bs.modal', function(event) {

      activityDetailsIframe.setAttribute('src', '');

    });

  }
}
