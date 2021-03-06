<?php
$server_check_version = '1.0.4';
$start_time = microtime(TRUE);

$operating_system = PHP_OS_FAMILY;

if ($operating_system === 'Windows') {
  // Win CPU
  $wmi = new COM('WinMgmts:\\\\.');
  $cpus = $wmi->InstancesOf('Win32_Processor');
  $cpuload = 0;
  $cpu_count = 0;
  foreach ($cpus as $key => $cpu) {
    $cpuload += $cpu->LoadPercentage;
    $cpu_count++;
  }
  // WIN MEM
  $res = $wmi->ExecQuery('SELECT FreePhysicalMemory,FreeVirtualMemory,TotalSwapSpaceSize,TotalVirtualMemorySize,TotalVisibleMemorySize FROM Win32_OperatingSystem');
  $mem = $res->ItemIndex(0);
  $memtotal = round($mem->TotalVisibleMemorySize / 1000000, 2);
  $memavailable = round($mem->FreePhysicalMemory / 1000000, 2);
  $memused = round($memtotal - $memavailable, 2);
  // WIN CONNECTIONS
  $connections = shell_exec('netstat -nt | findstr :80 | findstr ESTABLISHED | find /C /V ""');
  $totalconnections = shell_exec('netstat -nt | findstr :80 | find /C /V ""');
} else {
  // Linux CPU
  $load = sys_getloadavg();
  $cpuload = $load[0];
  // Linux MEM
  $free = shell_exec('free');
  $free = (string)trim($free);
  $free_arr = explode("\n", $free);
  $mem = explode(" ", $free_arr[1]);
  $mem = array_filter($mem, function ($value) {
    return ($value !== null && $value !== false && $value !== '');
  }); // removes nulls from array
  $mem = array_merge($mem); // puts arrays back to [0],[1],[2] after
  $memtotal = round($mem[1] / 1000000, 2);
  $memused = round($mem[2] / 1000000, 2);
  $memfree = round($mem[3] / 1000000, 2);
  $memshared = round($mem[4] / 1000000, 2);
  $memcached = round($mem[5] / 1000000, 2);
  $memavailable = round($mem[6] / 1000000, 2);
  // Linux Connections
  $connections = `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
  $totalconnections = `netstat -ntu | grep :80 | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
}

$memusage = round(($memavailable / $memtotal) * 100);

$phpload = round(memory_get_usage() / 1000000, 2);

$diskfree = round(disk_free_space(".") / 1000000000);
$disktotal = round(disk_total_space(".") / 1000000000);
$diskused = round($disktotal - $diskfree);

$diskusage = round($diskused / $disktotal * 100);

if ($memusage > 85 || $cpuload > 85) {
  $trafficlight = 'red';
} elseif ($memusage > 50 || $cpuload > 50) {
  $trafficlight = 'orange';
} else {
  $trafficlight = '#2F2';
}

$end_time = microtime(TRUE);
$time_taken = $end_time - $start_time;
$total_time = round($time_taken, 4);

if (isset($_GET['json'])) {
  echo '{"ram":' . $memusage . ',"cpu":' . $cpuload . ',"disk":' . $diskusage . ',"connections":' . $totalconnections . '}';
  exit;
}
?>

<div class="information">
  <p><span class=" description big">??????? RAM Usage:</span> <span class="result big"><?php echo $memusage; ?>%</span></p>
  <p><span class="description big">??????? CPU Usage: </span> <span class="result big"><?php echo $cpuload; ?>%</span></p>
  <p><span class="description">???? Hard Disk Usage: </span> <span class="result"><?php echo $diskusage; ?>%</span></p>
  <p><span class="description">???? Established Connections: </span> <span class="result"><?php echo $connections; ?></span></p>
  <p><span class="description">???? Total Connections: </span> <span class="result"><?php echo $totalconnections; ?></span></p>
  <hr>
  <p><span class="description">??????? RAM Total:</span> <span class="result"><?php echo $memtotal; ?> GB</span></p>
  <p><span class="description">??????? RAM Used:</span> <span class="result"><?php echo $memused; ?> GB</span></p>
  <p><span class="description">??????? RAM Available:</span> <span class="result"><?php echo $memavailable; ?> GB</span></p>
  <hr>
  <p><span class="description">???? Hard Disk Free:</span> <span class="result"><?php echo $diskfree; ?> GB</span></p>
  <p><span class="description">???? Hard Disk Used:</span> <span class="result"><?php echo $diskused; ?> GB</span></p>
  <p><span class="description">???? Hard Disk Total:</span> <span class="result"><?php echo $disktotal; ?> GB</span></p>
  <hr>
  <div id="details">
    <p><span class="description">???? Server Name: </span> <span class="result"><?php echo $_SERVER['SERVER_NAME']; ?></span></p>
    <p><span class="description">???? Server Addr: </span> <span class="result"><?php echo $_SERVER['SERVER_ADDR']; ?></span></p>
    <p><span class="description">???? PHP Version: </span> <span class="result"><?php echo phpversion(); ?></span></p>
    <p><span class="description">??????? PHP Load: </span> <span class="result"><?php echo $phpload; ?> GB</span></p>

    <p><span class="description">?????? Load Time: </span> <span class="result"><?php echo $total_time; ?> sec</span></p>
  </div>
</div>
<div id="trafficlight" class="nodark" style="background: <?php echo $trafficlight; ?>;"></div>