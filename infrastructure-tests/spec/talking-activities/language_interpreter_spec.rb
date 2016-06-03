require 'spec_helper'

describe package('php5-cli') do
  it { should be_installed }
end

describe command('php -v') do
  its(:stdout) { should match /PHP 5.5.9/ }
end

describe command('composer --version') do
  its(:stdout) { should match /Composer version 1.1./ }
end
