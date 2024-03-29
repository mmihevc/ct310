<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.default.min.css">
    <style>
      .tablesorter-blue {
      width: 100%;
      background-color: #fff;
      margin: 10px 0 15px;
      text-align: left;
      border-spacing: 0;
      border: #cdcdcd 1px solid;
      border-width: 1px 0 0 1px;
      }
      .tablesorter-blue th,
      .tablesorter-blue td {
      border: #cdcdcd 1px solid;
      border-width: 0 1px 1px 0;
      }

      .tablesorter-blue th,
      .tablesorter-blue thead td {
      font: 12px/18px Arial, Sans-serif;
      font-weight: bold;
      color: #000;
      background-color: #99bfe6;
      border-collapse: collapse;
      padding: 4px;
      text-shadow: 0 1px 0 rgba(204, 204, 204, 0.7);
      }
      .tablesorter-blue tbody td,
      .tablesorter-blue tfoot th,
      .tablesorter-blue tfoot td {
      padding: 4px;
      vertical-align: top;
      }
      .tablesorter-blue .header,
      .tablesorter-blue .tablesorter-header {
      background-image: url(data:image/gif;base64,R0lGODlhFQAJAIAAACMtMP///yH5BAEAAAEALAAAAAAVAAkAAAIXjI+AywnaYnhUMoqt3gZXPmVg94yJVQAAOw==);
      background-repeat: no-repeat;
      background-position: center right;
      padding: 4px 18px 4px 4px;
      white-space: normal;
      cursor: pointer;
      }
      .tablesorter-blue .headerSortUp,
      .tablesorter-blue .tablesorter-headerSortUp,
      .tablesorter-blue .tablesorter-headerAsc {
      background-color: #9fbfdf;
      background-image: url(data:image/gif;base64,R0lGODlhFQAEAIAAACMtMP///yH5BAEAAAEALAAAAAAVAAQAAAINjI8Bya2wnINUMopZAQA7);
      }
      .tablesorter-blue .headerSortDown,
      .tablesorter-blue .tablesorter-headerSortDown,
      .tablesorter-blue .tablesorter-headerDesc {
      background-color: #8cb3d9;
      background-image: url(data:image/gif;base64,R0lGODlhFQAEAIAAACMtMP///yH5BAEAAAEALAAAAAAVAAQAAAINjB+gC+jP2ptn0WskLQA7);
      }
      .tablesorter-blue thead .sorter-false {
      background-image: none;
      cursor: default;
      padding: 4px;
      }

      .tablesorter-blue tfoot .tablesorter-headerSortUp,
      .tablesorter-blue tfoot .tablesorter-headerSortDown,
      .tablesorter-blue tfoot .tablesorter-headerAsc,
      .tablesorter-blue tfoot .tablesorter-headerDesc {
      background-image: none;
      }

      .tablesorter-blue td {
      color: #3d3d3d;
      background-color: #fff;
      padding: 4px;
      vertical-align: top;
      }

      .tablesorter-blue tbody > tr.hover > td,
      .tablesorter-blue tbody > tr:hover > td,
      .tablesorter-blue tbody > tr:hover + tr.tablesorter-childRow > td,
      .tablesorter-blue tbody > tr:hover + tr.tablesorter-childRow + tr.tablesorter-childRow > td,
      .tablesorter-blue tbody > tr.even.hover > td,
      .tablesorter-blue tbody > tr.even:hover > td,
      .tablesorter-blue tbody > tr.even:hover + tr.tablesorter-childRow > td,
      .tablesorter-blue tbody > tr.even:hover + tr.tablesorter-childRow + tr.tablesorter-childRow > td {
      background-color: #d9d9d9;
      }
      .tablesorter-blue tbody > tr.odd.hover > td,
      .tablesorter-blue tbody > tr.odd:hover > td,
      .tablesorter-blue tbody > tr.odd:hover + tr.tablesorter-childRow > td,
      .tablesorter-blue tbody > tr.odd:hover + tr.tablesorter-childRow + tr.tablesorter-childRow > td {
      background-color: #bfbfbf;
      }

      .tablesorter-blue .tablesorter-processing {
      background-position: center center !important;
      background-repeat: no-repeat !important;
      background-image: url('data:image/gif;base64,R0lGODlhFAAUAKEAAO7u7lpaWgAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQBCgACACwAAAAAFAAUAAACQZRvoIDtu1wLQUAlqKTVxqwhXIiBnDg6Y4eyx4lKW5XK7wrLeK3vbq8J2W4T4e1nMhpWrZCTt3xKZ8kgsggdJmUFACH5BAEKAAIALAcAAAALAAcAAAIUVB6ii7jajgCAuUmtovxtXnmdUAAAIfkEAQoAAgAsDQACAAcACwAAAhRUIpmHy/3gUVQAQO9NetuugCFWAAAh+QQBCgACACwNAAcABwALAAACE5QVcZjKbVo6ck2AF95m5/6BSwEAIfkEAQoAAgAsBwANAAsABwAAAhOUH3kr6QaAcSrGWe1VQl+mMUIBACH5BAEKAAIALAIADQALAAcAAAIUlICmh7ncTAgqijkruDiv7n2YUAAAIfkEAQoAAgAsAAAHAAcACwAAAhQUIGmHyedehIoqFXLKfPOAaZdWAAAh+QQFCgACACwAAAIABwALAAACFJQFcJiXb15zLYRl7cla8OtlGGgUADs=') !important;
      }

      .tablesorter-blue tbody tr.odd > td {
      background-color: #ebf2fa;
      }
      .tablesorter-blue tbody tr.even > td {
      background-color: #fff;
      }

      .tablesorter-blue td.primary,
      .tablesorter-blue tr.odd td.primary {
      background-color: #99b3e6;
      }
      .tablesorter-blue tr.even td.primary {
      background-color: #c2d1f0;
      }
      .tablesorter-blue td.secondary,
      .tablesorter-blue tr.odd td.secondary {
      background-color: #c2d1f0;
      }
      .tablesorter-blue tr.even td.secondary {
      background-color: #d6e0f5;
      }
      .tablesorter-blue td.tertiary,
      .tablesorter-blue tr.odd td.tertiary {
      background-color: #d6e0f5;
      }
      .tablesorter-blue tr.even td.tertiary {
      background-color: #ebf0fa;
      }

      .tablesorter-blue > caption {
      background-color: #fff;
      }

      .tablesorter-blue .tablesorter-filter-row {
      background-color: #eee;
      }
      .tablesorter-blue .tablesorter-filter-row td {
      background-color: #eee;
      line-height: normal;
      text-align: center; /* center the input */
      -webkit-transition: line-height 0.1s ease;
      -moz-transition: line-height 0.1s ease;
      -o-transition: line-height 0.1s ease;
      transition: line-height 0.1s ease;
      }

      .tablesorter-blue .tablesorter-filter-row .disabled {
      opacity: 0.5;
      filter: alpha(opacity=50);
      cursor: not-allowed;
      }

      .tablesorter-blue .tablesorter-filter-row.hideme td {
      padding: 2px;
      margin: 0;
      line-height: 0;
      cursor: pointer;
      }
      .tablesorter-blue .tablesorter-filter-row.hideme * {
      height: 1px;
      min-height: 0;
      border: 0;
      padding: 0;
      margin: 0;
      opacity: 0;
      filter: alpha(opacity=0);
      }

      .tablesorter-blue input.tablesorter-filter,
      .tablesorter-blue select.tablesorter-filter {
      width: 98%;
      height: auto;
      margin: 0;
      padding: 4px;
      background-color: #fff;
      border: 1px solid #bbb;
      color: #333;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      -webkit-transition: height 0.1s ease;
      -moz-transition: height 0.1s ease;
      -o-transition: height 0.1s ease;
      transition: height 0.1s ease;
      }

      .tablesorter .filtered {
      display: none;
      }

      .tablesorter .tablesorter-errorRow td {
      text-align: center;
      cursor: pointer;
      background-color: #e6bf99;
      }
    </style>
  <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js"></script>
<title><?php echo $title ?></title>
</head>

  <body>
    <?php echo $contents ?>
    <div class="row">
      <div class ="col">
        <table id="drgTable" class="tbl">
          <thead class ="thread-dark">
            <tr>
              <th>Name</th>
              <th>State</th>
              <th>MPN</th>
            </tr>
            </thead>
            <tbody>
              <?php
              foreach($hospital_data as $row){
                echo "<tr>\n";
                $l = Uri::base(). "index.php/hospital/hospital_details.php?hospital_name=" .$row["Provider_Name"] ."&hospital_id=".$row["Provider_Id"];
                echo "<td><a href ='$l'>" . $row["Provider_Name"] . "</a></td>";
                echo "<td>" . $row["Provider_State"] . "</td>";
                echo "<td>" . $row["Provider_Id"] . "</td>";
              echo "</tr>\n";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <script type="text/javascript">
      $(function() {
        $(".tbl").tablesorter({
          theme: 'blue'
        });
      });
      </script>

      <nav label="navigation">
        <ul class="list justify-content-sm-center">
          <?php
            if ($start > 0) {
              $prev_path = Uri::base() . 'index.php/hospital/hospital_list?start=' . max($start - 25, 0);
              echo '<li class="page-item"><a class="page-link" href="' . $prev_path . '">Previous</a></li>';
            }
           ?>
           <?php
              $next_path = Uri::base() . 'index.php/hospital/hospital_list?start=' . ($start + 25);
              echo '<li class="page-item"><a class="page-link" href="' . $next_path . '">Next</a></li>';
            ?>
        </ul>
      </nav>

  </body>
</html>
