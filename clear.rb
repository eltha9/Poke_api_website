files = Dir["./cache/*"]

files.each do |file|
    File.delete(file) if File.exist?(file)
end

puts 'files are deleted'