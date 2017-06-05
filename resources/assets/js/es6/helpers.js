NodeList.prototype.addEventListener = function (event_name, callback, useCapture)
{
    for (var i = 0; i < this.length; i++)
    {
        this[i].addEventListener(event_name, callback, useCapture);
    }
};