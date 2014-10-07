$(document).ready(function() {
  if(typeof FileActions!=='undefined'){
    FileActions.register('image', 'View', OC.PERMISSION_READ, '', function(filename){
      allImages = getFiles(false, 'image', 'name');
      viewImage($('#dir').val(), filename, allImages);
    });
    FileActions.setDefault('image', 'View');
  }
  OC.search.customResults.Images=function(row,item){
    var image=item.link.substr(item.link.indexOf('download')+8);
    var a=row.find('a');
    a.attr('href','#');
    a.click(function(){
      image = decodeURIComponent(image);
      var pos=image.lastIndexOf('/')
      var file=image.substr(pos + 1);
      var dir=image.substr(0,pos);
      viewImage(dir, file);
    });
  }
});

function viewImage(dir, file, multipleFiles) {
  if (file.indexOf('.psd') > 0) {//can't view those
    return;
  }
  if (!multipleFiles || !multipleFiles.length) {
    var location = fileDownloadPath(dir, file, true);
    $.fancybox.open({
      href: location,
      title: file.replace(/</g, "&lt;").replace(/>/g, "&gt;"),
    });
  } else {
    var gallery = [], start = 0;
    for (var i = 0; i < multipleFiles.length; i++) {
      var thisFile = multipleFiles[i];
      gallery.push({
        href: fileDownloadPath(dir, thisFile, true),
        title: thisFile.replace(/</g, "&lt;").replace(/>/g, "&gt;")
      });
      if (file == thisFile) { start = i; }
    }
    $.fancybox.open(gallery, {index: start });
  }
}
