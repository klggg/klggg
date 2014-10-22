  console.log('background init');


chrome.browserAction.onClicked.addListener(function(tab) {
  // No tabs or host permissions needed!
  console.log('Turning ' + tab.url + ' red!');
alert("red");
  chrome.tabs.executeScript({
    code: 'document.body.style.backgroundColor="red"'
  });
});

