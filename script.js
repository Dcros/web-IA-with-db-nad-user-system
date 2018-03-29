try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}

var noteTextarea = $('#note-textarea');
var instructions = $('#recording-instructions');

var noteContent = '';
var recorderJarvi;
//English = 3
//Spanish = 6
var defaultLanguage = 3;
recognition.continuous = true;
var timeToStop = 0;

//user sessions
var waitingIdentify = 0;
var sessionUsername = "";

var lenguageVarsJS = [];
defineAgainLenguage();

$('#start-record-btn').on('click', function(e) {
  recognition.start();
});

recognition.onstart = function() { 
  instructions.text('Voice recognition activated. Try speaking into the microphone.');
  //recorderJarvi = setInterval(stopOnVoiceNone, 1);
}

recognition.onresult = function(event) {

  var current = event.resultIndex;

  var transcript = event.results[current][0].transcript;

  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent += transcript;
    //timeToStop = 1000;
    stopOnVoiceNone();
  }

};

recognition.onspeechend = function() {
  instructions.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition.onerror = function(event) {
  if(event.error == 'no-speech') {
    var text = noteContent;
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.rate = 10 / 10;
    msg.pitch = 1;
    msg.text = lenguageVarsJS[0];
    $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+lenguageVarsJS[0]+"\n");
    msg.voice = voices[defaultLanguage];
    speechSynthesis.speak(msg);
    instructions.text('No speech was detected. Try again.');  
  };
}

function stopOnVoiceNone(){
  if (timeToStop == 0) {
    recognition.stop();
    var text = noteContent;
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.rate = 10 / 10;
    msg.pitch = 1;
    if (noteContent != "") {
      $('#note-textarea').val($('#note-textarea').val()+"You says: "+noteContent+"\n");

      msg.onend = function(e) {
        console.log('Finished in ' + event.elapsedTime + ' seconds.');
      };

      if (waitingIdentify == 1) {
        setTimeout(function(){
          $.ajax({
            type: 'POST',
            url: 'actions.php',
            crossDomain: true,
            data: {"language": defaultLanguage, "searchUser": "1", "keywordSearch": noteContent}
          }).success(function(data, textStatus, jqXHR){

            responseLogin = jQuery.parseJSON(data);console.debug(data);

            if(responseLogin.status == 'ok')
            {
              msg.text = responseLogin.message;
              $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+responseLogin.message+"\n");
              sessionUsername = responseLogin.user;
              if (typeof responseLogin.action !== 'undefined' && typeof responseLogin.action !== 'null') {
                voiceActionMethod(responseLogin.action);
              }
              msg.voice = voices[defaultLanguage];
              speechSynthesis.speak(msg);
            }
            else
            {
              msg.text = responseLogin.message;
              $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+responseLogin.message+"\n");
              msg.voice = voices[defaultLanguage];
              speechSynthesis.speak(msg);
            }

          }).error(function(jqXHR, textStatus, errorThrown){

          });
          noteContent = "";
        }, 99);
      }else if (waitingIdentify == 2) {
        setTimeout(function(){
          $.ajax({
            type: 'POST',
            url: 'actions.php',
            crossDomain: true,
            data: {"language": defaultLanguage, "searchPassword": "1", "userSession": sessionUsername, "keywordSearch": noteContent}
          }).success(function(data, textStatus, jqXHR){
            console.debug(data);
            responseLogin = jQuery.parseJSON(data);

            if(responseLogin.status == 'ok')
            {
              msg.text = responseLogin.message;
              $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+responseLogin.message+"\n");
              if (typeof responseLogin.action !== 'undefined' && typeof responseLogin.action !== 'null') {
                voiceActionMethod(responseLogin.action);
              }
              msg.voice = voices[defaultLanguage];
              speechSynthesis.speak(msg);
            }
            else
            {
              msg.text = responseLogin.message;
              $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+responseLogin.message+"\n");
              msg.voice = voices[defaultLanguage];
              speechSynthesis.speak(msg);
            }

          }).error(function(jqXHR, textStatus, errorThrown){

          });
          noteContent = "";
        }, 99);
      }else if (waitingIdentify == 3) {
        setTimeout(function(){
          $.ajax({
            type: 'POST',
            url: 'actions.php',
            crossDomain: true,
            data: {"language": defaultLanguage, "sessionSave": "1", "userSession": sessionUsername, "keywordSearch": noteContent}
          }).success(function(data, textStatus, jqXHR){
            console.debug(data);
            responseLogin = jQuery.parseJSON(data);
            if(responseLogin.status == 'ok')
            {
              msg.text = responseLogin.message;
              if (typeof responseLogin.action !== 'undefined' && typeof responseLogin.action !== 'null') {
                voiceActionMethod(responseLogin.action);
              }

            }
            else
            {
             
            }

          }).error(function(jqXHR, textStatus, errorThrown){

          });
          noteContent = "";
        }, 99);
      }else{
        setTimeout(function(){
          $.ajax({
            type: 'POST',
            url: 'actions.php',
            crossDomain: true,
            data: {"language": defaultLanguage, "searchResponse": "1", "keywordSearch": noteContent}
          }).success(function(data, textStatus, jqXHR){

            responseLogin = jQuery.parseJSON(data);console.debug(data);

            if(responseLogin.status == 'ok')
            {
              msg.text = responseLogin.message;
              $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+responseLogin.message+"\n");
              if (typeof responseLogin.action !== 'undefined' && typeof responseLogin.action !== 'null') {
                voiceActionMethod(responseLogin.action);
              }
              msg.voice = voices[defaultLanguage];
              speechSynthesis.speak(msg);
            }
            else
            {
              msg.text = responseLogin.message;
              $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+responseLogin.message+"\n");
              msg.voice = voices[defaultLanguage];
              speechSynthesis.speak(msg);
            }

          }).error(function(jqXHR, textStatus, errorThrown){

          });
          noteContent = "";
        }, 99);
      }
    }
    else
    {
      msg.text = lenguageVarsJS[0];
      $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+lenguageVarsJS[0]+"\n");
      msg.voice = voices[defaultLanguage];
      speechSynthesis.speak(msg);
    }
    //clearInterval(recorderJarvi);
    //timeToStop = 1000;
  }else{
    timeToStop--;
  }
  var psconsole = $('#note-textarea');
  if(psconsole.length){psconsole.scrollTop(psconsole[0].scrollHeight - psconsole.height());}
}

function voiceActionMethod(action){
  if (action == 1) {
    defaultLanguage = 6;
    defineAgainLenguage();
  }
  else if (action == 2) {
    $.ajax({
      type: 'POST',
      url: 'actions.php',
      crossDomain: true,
      data: {"weatherActual": "1"}
    }).success(function(data, textStatus, jqXHR){
      responseLogin = jQuery.parseJSON(data);

      var text = lenguageVarsJS[1].replace("%d1", responseLogin.list[0].main.temp);
      text = text.replace("%d2", responseLogin.list[0].main.temp_min);
      text = text.replace("%d3", responseLogin.list[0].main.temp_max);
      var msg = new SpeechSynthesisUtterance();
      var voices = window.speechSynthesis.getVoices();
      msg.rate = 10 / 10;
      msg.pitch = 1;
      msg.text = text;
      $('#note-textarea').val($('#note-textarea').val()+"Jarvi says: "+text+"\n");
      msg.voice = voices[defaultLanguage];
      speechSynthesis.speak(msg);
      var psconsole = $('#note-textarea');
      if(psconsole.length){psconsole.scrollTop(psconsole[0].scrollHeight - psconsole.height());}

    }).error(function(jqXHR, textStatus, errorThrown){

    });
  }
  else if (action == 3) {
    defaultLanguage = 3;
    defineAgainLenguage();
  }
  else if (action == 4) {
    waitingIdentify = 1;
  }
  else if (action == 5) {
    waitingIdentify = 2;
  }
  else if (action == 6) {
    waitingIdentify = 3;
  }
  else if (action == 7) {
    waitingIdentify = 0;
  }

}

function defineAgainLenguage()
{
  if (defaultLanguage == 3) {
    lenguageVarsJS[0] = "Say me anything please";
    lenguageVarsJS[1] = "The current temperature is %d1 degrees, with possible drops to %d2 degress and a maximum of %d3 degrees";
  }
  else if (defaultLanguage == 6) {
    lenguageVarsJS[0] = "Hablame por favor";
    lenguageVarsJS[1] = "La temperatura actual es de %d1 grados, con posible bajada hasta %d2 grados y un maximo de %d3 grados";
  }
}

function readOutLoud(message) {
	var speech = new SpeechSynthesisUtterance();

  // Set the text and voice attributes.
	speech.text = message;
	speech.volume = 1;
	speech.rate = 1;
	speech.pitch = 1;
  
	window.speechSynthesis.speak(speech);
}