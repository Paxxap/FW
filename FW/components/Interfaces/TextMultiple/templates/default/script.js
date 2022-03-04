var flag = 0;
function addInput(Input)
{
  var parentElem = Input.parentElement;
  var input = parentElem.children[1];

  var classInput = input.getAttribute("class");
  var nameInput = input.getAttribute("name");
  var defaultInput = input.getAttribute("default");

  var newInput = document.createElement("input");
  newInput.setAttribute('class', classInput);
  newInput.setAttribute('type', 'text');
  newInput.setAttribute('name', nameInput);
  newInput.setAttribute('default', defaultInput);

  console.log(newInput);
  Input.before(newInput);
  flag += 1;
}
