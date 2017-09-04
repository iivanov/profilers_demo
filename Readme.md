sudo apt-get install blackfire-agent  
Configure your Blackfire credentials:
sudo blackfire-agent -register


/etc/init.d/blackfire-agent restart








zend_extension=xdebug.so
xdebug.auto_trace=1
xdebug.profiler_enable=1
xdebug.profiler_output_dir=/tmp/
xdebug.trace_enable_trigger=1
xdebug.trace_enable_trigger_value=XDEBUG_PROFILE