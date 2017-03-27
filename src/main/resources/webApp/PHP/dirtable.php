<table id="mainTable">
    <thead>
    <tr>

        <th>DOCUMENT TITLE</th>
        <th>OWNER</th>
        <th>ACTIVE DATE</th>
        <th>MODIFIED DATE</th>
        <th>EDIT</th>
        <th>DOWNLOAD</th>
        <th>REMOVE FILE</th>

    </tr>
    </thead>
    <tbody>
    <?php

    // Opens directory
    $myDirectory = opendir("./testdirectory/");
//    $myDirectory = opendir(".");

    // Gets each entry
    while($entryName=readdir($myDirectory)) {
        $dirArray[]=$entryName;
    }

    // Finds extensions of files
    function findexts ($filename) {
        $filename=strtolower($filename);
        $exts=preg_split("[\//.]", $filename);
        $n=count($exts)-1;
        $exts=$exts[$n];
        return $exts;
    }

    // Closes directory
    closedir($myDirectory);

    // Counts elements in array
    $indexCount=count($dirArray);

    // Sorts files
    sort($dirArray);

    // Loops through the array of files
    for($index=0; $index < $indexCount; $index++) {

        // Allows ./?hidden to show hidden files
        if($_SERVER['QUERY_STRING']=="hidden")
        {$hide="";
            $ahref="./";
            $atext="Hide";}
        else
        {$hide=".";
            $ahref="./?hidden";
            $atext="Show";}
        if(substr("$dirArray[$index]", 0, 1) != $hide) {

            // Gets File Names
            $name=$dirArray[$index];
            $namehref=$dirArray[$index];

            //Gets File Owner
            $author= fileowner($dirArray[$index]);

            // Gets Extensions
            $extn=findexts($dirArray[$index]);

            // Gets file size
            $size=number_format(filesize($dirArray[$index]));

            // Gets Date Created Data
            $createtime=date("j M Y g:i A", filectime($dirArray[$index]));
            $createtimekey=date("YmdHis", filectime($dirArray[$index]));

            // Gets Date Modified Data
            $modtime=date("j M Y g:i A", filemtime($dirArray[$index]));
            $timekey=date("YmdHis", filemtime($dirArray[$index]));


            // Prettifies File Types, add more to suit your needs.
            switch ($extn){
                case "txt": $extn="Text File"; break;
                case "pdf": $extn="PDF Document"; break;
                case "doc": $extn="DOC Document"; break;

                case "zip": $extn="ZIP Archive"; break;

                default: $extn=strtoupper($extn); break;
            }

            // Separates directories
            if(is_dir($dirArray[$index])) {
                $extn="&lt;Directory&gt;";
                $size="&lt;Directory&gt;";
                $class="dir";
            } else {
                $class="file";
            }

            // Cleans up . and .. directories
            if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
            if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}


            // Print 'em
            print("
<form action='./deleteFile.php' method='get'>
          <tr class='$class' id='delete'>
            <td>$name</td>
            
            <td>$author</td>
            
            <td>$createtime</td>
            
            <td>$modtime</td>
            
            <td><button class='btn small secondary'>EDIT</button></td>
            <td><button class='btn small primary'><a href='./testdirectory/$namehref'>DOWNLOAD</a></button></td>
            
            <td><button class='btn small secondary'>DELETE</button> </td>
            
          </tr>
          </form>");
        }
    }
    ?>


    </tbody>
</table>